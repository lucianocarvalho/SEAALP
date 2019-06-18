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

    public function buscar( $perfil = null, $string = '', $type = "normal", $quantidade = 30, $pagina = 0 ) {

        $this->db->select();
        $this->db->from( $this->table );

        $this->db->group_start();
        $this->db->like('email', $string );
        $this->db->group_end();

        if( ! is_null( $perfil ) )
            $this->db->where('perfil', $perfil );

        if( $type == 'count' )
            return $this->db->get()->num_rows();

        if( $quantidade !== FALSE )
            $this->db->limit( $quantidade, $pagina );

        $this->db->order_by('usuarios.id', 'ASC');

        return $this->db->get()->result_array();
    }

    public function remover( $id ) {
        $this->db->where('id', $id );
        return $this->db->delete( $this->table );
    }

    public function selecionar( $id ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('id', $id );
        return $this->db->get()->row();
    }

    public function atualizar( Usuario $usuario ) {
        $this->db->where('id', $usuario->getId() );
		return $this->db->update( $this->table, $usuario->to_array() );
    }

    public function existeUsuario( $email ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('email', $email );
        return $this->db->get()->num_rows();
    }
}