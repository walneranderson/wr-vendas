<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DadosUsuario extends CI_Controller {

		function __construct()
		{
            parent::__construct();
            
            $this->load->model('verifyUser');
        }
    
		public function showData()
		{	
            $usuario = $this->verifyUser->findUser('id', $this->uri->segment(2));
            $this->load->view('editarUsuario', $usuario);
		}
	}