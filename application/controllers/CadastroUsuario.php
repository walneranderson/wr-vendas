<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CadastroUsuario extends CI_Controller {

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
			
			$this->load->view('cadastroUsuario');
		}

		public function registerUser()
		{
			date_default_timezone_set('America/Sao_Paulo');       
	
			$date = new DateTime();
			$dataForm = $this->input->post();
			$dataForm['created'] = $date->format('Y-m-d H:i:s');
			$dataForm['senha'] = password_hash($dataForm['senha'], PASSWORD_DEFAULT);
			unset($dataForm['confSenha']);

			$this->form_validation->set_rules('nome', 'NOME', 'trim|required');
			$this->form_validation->set_rules('matricula', 'MATRÍCULA', 'trim|required');
			$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');
			$this->form_validation->set_rules('confSenha', 'REPITA A SENHA', 'trim|required|matches[senha]');

			if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
					set_msg_error(validation_errors());
					$this->load->view('cadastroUsuario');
				}
			}else {
				$isValid = $this->verifyUser->findUser('matricula', $dataForm['matricula']);
				if($isValid != NULL) {
					set_msg_error("Usuário já cadastrado!");
					$this->load->view('cadastroUsuario');
				}else {					
					$userData = elements(array('nome','matricula', 'senha', 'created'), $dataForm); 
					$status = $this->create->do_insert('usuarios', $userData);
						
					if($status > 0) {
						set_msg_sucess("Usuário inserido com sucesso!");
						redirect('cadastroUsuario', 'refresh');
					}else {
						set_msg_error("Erro ao inserir dados!");
						redirect('cadastroUsuario', 'refresh');
					}
				}
			}
		}
	}