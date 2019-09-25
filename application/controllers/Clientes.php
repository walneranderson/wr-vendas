<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Clientes extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('read');
		}
        
		public function findAllClient()
		{
			loginVerify();

			$dados = array("clients" => $this->read->finAll("clientes"));
			$this->load->view('clientes', $dados);
		}
	}