<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RemoverUsuario extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('verifyUser');
			$this->load->model('delete');
        }

		public function userDelete()
		{	
			loginVerify();
			
			if ($this->delete->do_delete('usuarios', $this->uri->segment(3))) {
				set_msg_sucess("Usuário excluido com sucesso!");
				redirect('usuarios', 'refresh');
			} else {
				set_msg_error("Error ao excluir o usuário");
				redirect('usuarios', 'refresh');
			}
		}
	}