<?php

class Lacunas_model extends CI_Model {

    private $table = 'lacunas';

    public function inserir( Lacuna $la )
    {
        $this->db->set( $la->to_array() );
		return $this->db->insert( $this->table );
    }
}