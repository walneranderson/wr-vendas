<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Model {

    function __construct()
    {
		parent::__construct();
	}

    public function finAll()
    {
       return $this->db->get("usuarios")->result_array();
	}	
}