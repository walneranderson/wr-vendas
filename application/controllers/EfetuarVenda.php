<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EfetuarVenda extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('create');
			$this->load->helper('array');
			$this->load->library('form_validation');
        }
        
		public function vend()
		{
            date_default_timezone_set('America/Sao_Paulo');       
            
            $dataForm                = $this->input->post();
            $date                    = new DateTime();
            $dataForm['data']        = $date->format('Y-m-d H:i:s');
            $dataForm['usuarios_id'] = $_SESSION["id"];
            $dataForm['created']     = $date->format('Y-m-d H:i:s');
            $dataForm['atualizacao'] = $date->format('Y-m-d H:i:s');
            
            if ($dataForm['forma_pagamento'] != 'NULL' && $dataForm['clientes_id'] != 'NULL' && $dataForm['produtos_id'] != 'NULL') {

                $this->form_validation->set_rules('clientes_id', 'CLIENTE', 'trim|required');
                $this->form_validation->set_rules('produtos_id', 'PRODUTO', 'trim|required');
                $this->form_validation->set_rules('quantidade', 'QUANTIDADE', 'trim|required');
                $this->form_validation->set_rules('forma_pagamento', 'FORMA DE PAGAMENTO', 'trim|required');
                $this->form_validation->set_rules('valor_total', 'VALOR TOTAL', 'trim|required');
    
                if($this->form_validation->run() == FALSE) {
                    if(validation_errors()){
                        set_msg_error(validation_errors());
                        redirect('vendas', 'refresh');
                    }
                }else {	
                    $vendData = elements(array('clientes_id','produtos_id', 'quantidade', 
                    'forma_pagamento', 'valor_total', 'data', 'usuarios_id', 'created', 'atualizacao'), $dataForm);
                    
                    $status = $this->create->do_insert('vendas', $vendData);
                
                    if($status > 0) {
                    	set_msg_sucess("Venda realizada com sucesso!");
                    	redirect('vendas', 'refresh');
                    }else {
                    	set_msg_error("Erro ao realizar venda!");
                    	redirect('vendas', 'refresh');
                    }
                }
            }else{
                set_msg_error("Por favor preencha todos os dados!");
                redirect('vendas', 'refresh');
            }
		}
	}