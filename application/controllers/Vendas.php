<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendas extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('readVendas');
		}
        
		public function index()
		{
			loginVerify();
			$dados = array("data" => $this->readVendas->finAll());
			$this->load->view('vendas', $dados);
		}
	}