<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class EditarProduto extends CI_Controller {

		function __construct()
		{
			parent::__construct();

			$this->load->model('updateProduct');
			$this->load->library('form_validation');
        }

		public function productUpdate()
		{	
            loginVerify();
            
            $dataForm = $this->input->post();
            
            if(strstr($dataForm['preco_vista'], ",") == TRUE){
                $dataForm['preco_vista'] = str_replace(',', '.', str_replace('.', '' ,str_replace(',00', '', $dataForm['preco_vista']))); 
            }
            if(strstr($dataForm['preco_prazo'], ",") == TRUE){
                $dataForm['preco_prazo'] = str_replace(',', '.', str_replace('.', '' ,str_replace(',00', '', $dataForm['preco_prazo'])));
            }

            $this->form_validation->set_rules('codigo_barras', 'CÓDIGO DE BARRAS', 'trim|required');
			$this->form_validation->set_rules('descricao', 'NOME DO PRODUTO', 'trim|required');
			$this->form_validation->set_rules('preco_vista', 'PREÇO AVISTA', 'trim|required');
			$this->form_validation->set_rules('preco_prazo', 'PREÇO A PRAZO', 'trim|required');
			$this->form_validation->set_rules('detalhamento', 'DETALHES DO PRODUTO', 'trim|required');
            
            if($this->form_validation->run() == FALSE) {
                if(validation_errors()){
                    set_msg_error(validation_errors());
                    redirect('edicao_produto/'.$dataForm['id'], 'refrash');
				}
			}else {
                $produto = $this->updateProduct->do_update($dataForm);
                if ($produto != NULL) {
                    set_msg_sucess("Produto atualizado com sucesso!");
                    redirect('edicao_produto/'.$dataForm['id'], 'refrash');
                } else {
                    set_msg_error("Erro ao atualizar produto");
                    redirect('edicao_produto/'.$dataForm['id'], 'refrash');
                }
            }
		}
	}