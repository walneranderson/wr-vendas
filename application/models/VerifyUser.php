<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyUser extends CI_Model {

	function __construct(){
		parent::__construct();
	}

    function findUser($campo, $matricula)
    {
		$this->db->where($campo, $matricula);
		$query = $this->db->get('usuarios', 1);
        if($query->num_rows() == 1) {
			return $query->row();
		}else {
			return NULL;
        }
    }
}