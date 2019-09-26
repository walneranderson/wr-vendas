<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateUser extends CI_Model {

    function __construct()
    {
        parent::__construct();
	}

    public function do_update($data)
    {
        $this->db->set('nome', $data['nome']);
        $this->db->set('matricula', $data['matricula']);
        if($data['senha'] != '') {
            $this->db->set('senha', password_hash($data['senha'], PASSWORD_DEFAULT));
        }
        $this->db->where('id', $data['id']);
        $this->db->update('usuarios');
        return $this->db->affected_rows();
	}	
}