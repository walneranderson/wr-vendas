<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendas extends CI_Controller {

		function __construct()
		{
			parent::__construct();
		}
        
		public function index()
		{
            loginVerify();
			$this->load->view('vendas');
		}
	}