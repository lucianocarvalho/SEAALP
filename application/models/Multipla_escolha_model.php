<?php

class Multipla_escolha_model extends CI_Model {

    private $table = 'multipla_escolha';

    public function inserir( Multipla_escolha $me )
    {
        $this->db->set( $me->to_array() );
		return $this->db->insert( $this->table );
    }

    public function selecionar( $id ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('idExercicio', $id );
        return $this->db->get()->result_array();
    }
}