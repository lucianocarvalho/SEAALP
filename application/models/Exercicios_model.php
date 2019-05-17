<?php

class Exercicios_model extends CI_Model {

    private $table = 'exercicios';

    public function buscar( $string = '', $type = "normal", $quantidade = 30, $pagina = 0 ) {

        $this->db->select('conteudos.*, exercicios.*');
        $this->db->from( $this->table );

        $this->db->join('conteudos', 'conteudos.id = exercicios.idConteudo');

        $this->db->group_start();
        $this->db->like('enunciado', $string );
        $this->db->group_end();

        if( $type == 'count' )
            return $this->db->get()->num_rows();

        if( $quantidade !== FALSE )
            $this->db->limit( $quantidade, $pagina );

        $this->db->order_by('exercicios.id', 'DESC');

        return $this->db->get()->result_array();
    }

    public function inserir( Exercicio $exercicio )
    {
        $this->db->set( $exercicio->to_array() );
		return $this->db->insert( $this->table );
    }

    public function inserir_id( Exercicio $exercicio ) {
        $this->db->set( $exercicio->to_array() );
		$this->db->insert( $this->table );
		return $this->db->insert_id();
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