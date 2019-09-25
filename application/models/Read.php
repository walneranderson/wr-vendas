<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Model {

    function __construct()
    {
		parent::__construct();
	}

    public function finAll($table)
    {
       return $this->db->get($table)->result_array();
	}	
}