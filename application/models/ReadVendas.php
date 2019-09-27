<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReadVendas extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
        $this->load->model('read');
	}

    public function finAll()
    {
        $result = array();
        $result['clientes'] = $this->read->finAll('clientes');
        $result['produtos'] = $this->read->finAll('produtos');
        return $result;
	}	
}