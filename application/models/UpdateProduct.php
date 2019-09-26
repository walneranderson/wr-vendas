<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateProduct extends CI_Model {

    function __construct()
    {
        parent::__construct();
	}

    public function do_update($data)
    {
        $this->db->set('codigo_barras', $data['codigo_barras']);
        $this->db->set('descricao', $data['descricao']);
        $this->db->set('preco_vista', $data['preco_vista']);
        $this->db->set('preco_prazo', $data['preco_prazo']);
        $this->db->set('detalhamento', $data['detalhamento']);
        $this->db->where('id', $data['id']);
        $this->db->update('produtos');
        return $this->db->affected_rows();
	}	
}