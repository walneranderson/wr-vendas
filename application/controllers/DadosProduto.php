<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DadosProduto extends CI_Controller {

		function __construct()
		{
            parent::__construct();
            
            $this->load->model('verify');
        }
    
		public function showData()
		{	
			loginVerify();
			
			$produto = $this->verify->find('produtos','id', $this->uri->segment(2));
            $this->load->view('editarProduto', $produto);
		}
	}