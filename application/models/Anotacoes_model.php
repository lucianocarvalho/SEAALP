<?php

class Anotacoes_model extends CI_Model {

    private $table = 'anotacoes';

    public function listar( $id ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('idConteudo', $id );
        return $this->db->get()->result_array();
    }

    public function inserir( Anotacao $anotacao )
    {
        $this->db->set( $anotacao->to_array() );
		return $this->db->insert( $this->table );
    }

    public function remover( $id ) {
        $this->db->where('id', $id );
        return $this->db->delete( $this->table );
    }
}