<?php

class Conteudos_Model extends CI_Model {

    private $table = 'conteudos';

    public function buscar( $string = '', $type = "normal", $quantidade = 30, $pagina = 0 ) {

        $this->db->select();
        $this->db->from( $this->table );

        $this->db->group_start();
        $this->db->like('titulo', $string );
        $this->db->or_like('texto', $string );
        $this->db->group_end();

        if( $type == 'count' )
            return $this->db->get()->num_rows();

        if( $quantidade !== FALSE )
            $this->db->limit( $quantidade, $pagina );

        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function inserir( Conteudo $conteudo )
    {
        $this->db->set( $conteudo->to_array() );
		return $this->db->insert( $this->table );
    }

    public function selecionar( $id ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('id', $id );
        return $this->db->get()->row();
    }

    public function remover( $id ) {
        $this->db->where('id', $id );
        return $this->db->delete( $this->table );
    }
}