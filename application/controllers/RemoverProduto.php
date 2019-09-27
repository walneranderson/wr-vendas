<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RemoverProduto extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('delete');
        }

		public function productDelete()
		{	
			loginVerify();
			
			if ($this->delete->do_delete('produtos', $this->uri->segment(3))) {
				set_msg_sucess("Produto excluido com sucesso!");
				redirect('produtos', 'refresh');
			} else {
				set_msg_error("Error ao excluir o produto!");
				redirect('produtos', 'refresh');
			}
		}
	}