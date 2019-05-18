<?php

class Blocos_model extends CI_Model {

    private $table = 'blocos';

    public function inserir( Bloco $bloco )
    {
        $this->db->set( $bloco->to_array() );
		return $this->db->insert( $this->table );
    }

    public function selecionar( $id )
    {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('idExercicio', $id );
        return $this->db->get()->row();
    }
}