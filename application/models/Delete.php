<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Model {

    function __construct()
    {
		parent::__construct();
	}

    public function do_delete($table, $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
	}	
}