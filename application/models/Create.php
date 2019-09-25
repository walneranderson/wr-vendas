<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Model {

    function __construct()
    {
		parent::__construct();
	}

    public function do_insert($table, $data)
    {
        $this->db->insert($table, $data);	
		
		return $this->db->insert_id();		
	}	
}