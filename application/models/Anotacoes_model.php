<?php

class Anotacoes_model extends CI_Model {

    private $table = 'anotacoes';

    public function buscar( $id, $string = '', $type = "normal", $quantidade = 30, $pagina = 0 ) {

        $this->db->select('anotacoes.id, anotacoes.texto, anotacoes.idConteudo, conteudos.titulo');
        $this->db->from( $this->table );

        $this->db->group_start();
        $this->db->like('anotacoes.texto', $string );
        $this->db->group_end();

        $this->db->join('conteudos', 'conteudos.id = anotacoes.idConteudo', 'INNER');

        if( $type == 'count' )
            return $this->db->get()->num_rows();

        if( $quantidade !== FALSE )
            $this->db->limit( $quantidade, $pagina );

        $this->db->order_by('anotacoes.id', 'ASC');

        return $this->db->get()->result_array();
    }

    public function listar( $id ) {
        $this->db->select();
        $this->db->from( $this->table );
        $this->db->where('idConteudo', $id );
        $this->db->where('idUsuario', $this->session->id );
        return $this->db->get()->result_array();
    }

    public function inserir( Anotacao $anotacao )
    {
        $anotacao->setIdUsuario( $this->session->id );
        $this->db->set( $anotacao->to_array() );
		return $this->db->insert( $this->table );
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

    public function atualizar( Anotacao $anotacao ) {
        $this->db->where('id', $anotacao->getId() );
		return $this->db->update( $this->table, $anotacao->to_array() );
    }
}