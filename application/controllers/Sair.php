<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sair extends CI_Controller {

		function __construct()
		{
			parent::__construct();
		}
        
		public function logout()
		{
			$this->session->sess_destroy();
        	redirect('login', 'refresh');
		}
	}