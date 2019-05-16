<?php

class Exemplos_model extends CI_Model {

    private $table = 'exemplos';

    public function buscar( $id, $string = '', $type = "normal", $quantidade = 30, $pagina = 0 ) {

        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('idConteudo', $id );
        
        $this->db->group_start();
        $this->db->like('texto', $string );
        $this->db->group_end();

        if( $type == 'count' )
            return $this->db->get()->num_rows();

        if( $quantidade !== FALSE )
            $this->db->limit( $quantidade, $pagina );

        $this->db->order_by('id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function inserir( Exemplo $exemplo )
    {
        $this->db->set( $exemplo->to_array() );
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

    public function listar() {
        $this->db->select();
        $this->db->from( $this->table );
        return $this->db->get()->result_array();
    }
}