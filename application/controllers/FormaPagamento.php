<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FormaPagamento extends CI_Controller {

		function __construct()
		{
			parent::__construct();

            $this->load->model('verify');
		}
        
		public function findFormPayment()
		{
            $id_produto     = $this->input->post('id');
            $formaPagamento = $this->input->post('pagamento');
            $product        = $this->verify->find('produtos', 'id', $id_produto);
            
            if($formaPagamento == "DINHEIRO") {
                echo $product->preco_vista;
            }else {
                echo $product->preco_prazo;
            }
		}
	}