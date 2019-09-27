<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateClient extends CI_Model {

    function __construct()
    {
        parent::__construct();
	}

    public function do_update($data)
    {
        $this->db->set('nome', $data['nome']);
        $this->db->set('cpf', $data['cpf']);
        $this->db->set('rg', $data['rg']);
        $this->db->set('endereco', $data['endereco']);
        $this->db->set('numero', $data['numero']);
        $this->db->set('estado', $data['estado']);
        $this->db->set('cidade', $data['cidade']);
        $this->db->set('renda', $data['renda']);
        $this->db->where('id', $data['id']);
        $this->db->update('clientes');
        return $this->db->affected_rows();
	}	
}