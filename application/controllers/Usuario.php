<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuario extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('read');
		}
        
		public function findAllUser()
		{
			loginVerify();

			$dados = array("users" => $this->read->finAll());
			$this->load->view('painel', $dados);
		}
	}