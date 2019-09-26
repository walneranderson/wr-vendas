<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DadosCliente extends CI_Controller {

		function __construct()
		{
            parent::__construct();
            
            $this->load->model('verify');
        }
    
		public function showData()
		{	
			loginVerify();
			
			$cliente = $this->verify->find('clientes','id', $this->uri->segment(2));
            $this->load->view('editarCliente', $cliente);
		}
	}