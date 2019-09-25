<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EditarUsuario extends CI_Controller {

		function __construct()
		{
			parent::__construct();

            $this->load->model('verifyUser');
			$this->load->model('update');
			$this->load->library('form_validation');
        }

		public function userUpdate()
		{	
            loginVerify();
            
            $dataForm = $this->input->post();

			$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
			$this->form_validation->set_rules('matricula', 'MATRÍCULA', 'trim|required');
            $this->form_validation->set_rules('senha', 'SENHA', 'trim');
            
            if ($dataForm['senha'] != '') {
                $this->form_validation->set_rules('confSenha', 'REPITA A SENHA', 'trim|required|matches[senha]');
            }

            if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
                    set_msg_error(validation_errors());
                    redirect('edicao_usuario/'.$dataForm['id'], 'refrash');
				}
			}else {
                $usuario = $this->update->do_update('id', $dataForm);
                if ($usuario != NULL) {
                    set_msg_sucess("Usuário atualizado com sucesso!");
                    redirect('edicao_usuario/'.$dataForm['id'], 'refrash');
                } else {
                    set_msg_error("Erro ao atualizar usuário");
                    redirect('edicao_usuario/'.$dataForm['id'], 'refrash');
                }
            }
		}
	}