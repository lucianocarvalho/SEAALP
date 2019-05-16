<?php

class Certo_errado_model extends CI_Model {

    private $table = 'certo_errado';

    public function inserir( Certo_errado $ce )
    {
        $this->db->set( $ce->to_array() );
		return $this->db->insert( $this->table );
    }
}