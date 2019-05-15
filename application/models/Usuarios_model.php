<?php

class Usuarios_Model extends CI_Model {

    private $table = 'usuarios';

    public function login( Usuario $usuario ) {
		$this->db->where('email', $usuario->getEmail() );
        $this->db->where('senha', md5( $usuario->getSenha() ) );

        $result = $this->db->get( $this->table )->row();

        if( ! is_null( $result ) )
            return $result;
        
        return false;
    }

    public function inserir( Usuario $usuario )
    {
        $this->db->set( $usuario->to_array() );
		return $this->db->insert( $this->table );
    }
}