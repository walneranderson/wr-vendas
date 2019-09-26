<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EditarCliente extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('updateClient');
			$this->load->library('form_validation');
        }

		public function clientUpdate()
		{	
            loginVerify();
            
            $dataForm = $this->input->post();
            $dataForm['renda'] = str_replace(',', '.', str_replace('.', '' ,str_replace(',00', '', $dataForm['renda'])));

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
                    redirect('edicao_cliente/'.$dataForm['id'], 'refrash');
				}
			}else {
                $cliente = $this->updateClient->do_update($dataForm);
                if ($cliente > 0) {
                    set_msg_sucess("Cliente atualizado com sucesso!");
                    redirect('edicao_cliente/'.$dataForm['id'], 'refrash');
                } else {
                    set_msg_error("Erro ao atualizar cliente");
                    redirect('edicao_cliente/'.$dataForm['id'], 'refrash');
                }
            }
		}
	}