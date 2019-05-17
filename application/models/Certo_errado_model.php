<?php

class Certo_errado_model extends CI_Model {

    private $table = 'certo_errado';

    public function inserir( Certo_errado $ce )
    {
        $this->db->set( $ce->to_array() );
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