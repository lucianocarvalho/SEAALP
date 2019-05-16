<?php

class Multipla_escolha_model extends CI_Model {

    private $table = 'multipla_escolha';

    public function inserir( Multipla_escolha $me )
    {
        $this->db->set( $me->to_array() );
		return $this->db->insert( $this->table );
    }
}