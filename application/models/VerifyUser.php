<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyUser extends CI_Model {

	function __construct(){
		parent::__construct();
	}

    function findUser($matricula)
    {
		$this->db->where('matricula', $matricula);
		$query = $this->db->get('usuarios', 1);
        if($query->num_rows() == 1) {
			return $query->row()->matricula;
		}else {
			return NULL;
        }
    }
}