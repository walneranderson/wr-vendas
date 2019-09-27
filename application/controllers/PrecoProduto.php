<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class PrecoProduto extends CI_Controller {

		function __construct()
		{
			parent::__construct();

            $this->load->model('verify');
		}
        
		public function findPrice()
		{
            $id_produto = $this->input->post('id');
            $product    = $this->verify->find('produtos', 'id', $id_produto);
            
            echo $product->preco_vista;
		}
	}