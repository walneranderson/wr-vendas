<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DadosUsuario extends CI_Controller {

		function __construct()
		{
            parent::__construct();
            
            $this->load->model('verify');
        }
    
		public function showData()
		{	
			loginVerify();
			
            $usuario = $this->verify->find('usuarios', 'id', $this->uri->segment(2));
            $this->load->view('editarUsuario', $usuario);
		}
	}