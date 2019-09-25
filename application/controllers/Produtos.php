<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Produtos extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('verifyUser');
			$this->load->model('read');
		}
        
		public function findAllProduct()
		{
			loginVerify();

			$dados = array("products" => $this->read->finAll("produtos"));
			$this->load->view('produtos', $dados);
		}
	}