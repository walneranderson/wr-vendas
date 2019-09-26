<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CadastroCliente extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('create');
			$this->load->helper('array');
			$this->load->library('form_validation');
		}

		public function index()
		{
			loginVerify();
			
			$this->load->view('cadastroCliente');
		}

		public function registerClient()
		{
            date_default_timezone_set('America/Sao_Paulo');       
            
            $dataForm                = $this->input->post();
	
			$date                    = new DateTime();
            $dataForm['usuarios_id'] = $_SESSION["id"];
            $dataForm['created']     = $date->format('Y-m-d H:i:s');
			$dataForm['renda']       = str_replace(',', '.', str_replace('.', '' ,str_replace(',00', '', $dataForm['renda']))) ;

            $this->form_validation->set_rules('nome', 'CÓDIGO DE BARRAS', 'trim|required');
			$this->form_validation->set_rules('rg', 'NOME DO PRODUTO', 'trim|required');
			$this->form_validation->set_rules('cpf', 'PREÇO AVISTA', 'trim|required');
			$this->form_validation->set_rules('endereco', 'PREÇO A PRAZO', 'trim|required');
            $this->form_validation->set_rules('numero', 'DETALHES DO PRODUTO', 'trim|required');
            $this->form_validation->set_rules('estado', 'CÓDIGO DE BARRAS', 'trim|required');
			$this->form_validation->set_rules('cidade', 'NOME DO PRODUTO', 'trim|required');
			$this->form_validation->set_rules('renda', 'PREÇO AVISTA', 'trim|required');

			if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
                    set_msg_error(validation_errors());
                    
					$this->load->view('cadastro_cliente');
				}
			}else {	
                $clientData = elements(array('nome','rg', 'cpf', 'endereco', 'numero', 'estado', 'cidade', 'renda', 'usuarios_id', 'created'), $dataForm);
				$status = $this->create->do_insert('clientes', $clientData);
					
				if($status > 0) {
					set_msg_sucess("Cliente inserido com sucesso!");
					redirect('cadastro_cliente', 'refresh');
				}else {
					set_msg_error("Erro ao inserir Cliente!");
					redirect('cadastro_cliente', 'refresh');
				}
			}
		}
	}