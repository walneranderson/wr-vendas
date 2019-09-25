<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

	class LoginAutenticar extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model("verify");
			$this->load->library('form_validation');
		}

		public function authenticate()
		{
			$loginData  = $this->input->post();
			$UserDataDb = $this->verify->find('usuarios', 'matricula', $loginData['matricula']);

			$this->form_validation->set_rules('matricula', 'Matrícula', 'trim|required');
			$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');

			if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
					set_msg_error(validation_errors());
					$this->load->view('login');
				}
			}else if($UserDataDb) {
				if (password_verify($loginData['senha'], $UserDataDb->senha)) {
					
					$this->session->set_userdata('logged', TRUE);
					$this->session->set_userdata('id', $UserDataDb->id);
					$this->session->set_userdata('nome', $UserDataDb->nome);
					$this->session->set_userdata('matricula', $UserDataDb->matricula);

					redirect('painel', 'refresh');

				}else {
					set_msg_error("Senha incorreta!");
					redirect('login', 'refresh');
				}
			}else {
				set_msg_error("Usuário não existe!");
				redirect('login', 'refresh');
			}
		}
	}