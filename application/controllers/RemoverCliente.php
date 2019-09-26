<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RemoverCliente extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			
			$this->load->model('delete');
        }

		public function clientDelete()
		{	
			loginVerify();
			
			if ($this->delete->do_delete('clientes', $this->uri->segment(3))) {
				set_msg_sucess("Cliente excluido com sucesso!");
				redirect('clientes', 'refresh');
			} else {
				set_msg_error("Error ao excluir o cliente!");
				redirect('clientes', 'refresh');
			}
		}
	}