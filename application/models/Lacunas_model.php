<?php

class Lacunas_model extends CI_Model {

    private $table = 'lacunas';

    public function inserir( Lacuna $la )
    {
        $this->db->set( $la->to_array() );
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