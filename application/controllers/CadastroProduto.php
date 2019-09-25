<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CadastroProduto extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('verifyUser');
			$this->load->model('create');
			$this->load->helper('array');
			$this->load->library('form_validation');
		}

		public function index()
		{
			loginVerify();
			
			$this->load->view('cadastroProduto');
		}

		public function registerProduct()
		{
            date_default_timezone_set('America/Sao_Paulo');       
            
            $dataForm                = $this->input->post();
	
			$date                    = new DateTime();
            $dataForm['usuarios_id'] = $_SESSION["id"];
            $dataForm['created']     = $date->format('Y-m-d H:i:s');
            $dataForm['preco_vista'] = str_replace(',', '.', $dataForm['preco_vista']);
            $dataForm['preco_prazo'] = str_replace(',', '.', $dataForm['preco_prazo']);

            $this->form_validation->set_rules('codigo_barras', 'CÓDIGO DE BARRAS', 'trim|required');
			$this->form_validation->set_rules('descricao', 'NOME DO PRODUTO', 'trim|required');
			$this->form_validation->set_rules('preco_vista', 'PREÇO AVISTA', 'trim|required');
			$this->form_validation->set_rules('preco_prazo', 'PREÇO A PRAZO', 'trim|required');
			$this->form_validation->set_rules('detalhamento', 'DETALHES DO PRODUTO', 'trim|required');

			if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
                    set_msg_error(validation_errors());
                    
					$this->load->view('cadastro_produto');
				}
			}else {	
                $productData = elements(array('codigo_barras','descricao', 'preco_vista', 
                'preco_prazo', 'detalhamento', 'usuarios_id', 'created'), $dataForm);
 
				$status = $this->create->do_insert('produtos', $productData);
					
				if($status > 0) {
					set_msg_sucess("Produto inserido com sucesso!");
					redirect('cadastro_produto', 'refresh');
				}else {
					set_msg_error("Erro ao inserir produto!");
					redirect('cadastro_produto', 'refresh');
				}
			}
		}
	}