<?php

class Migration_Initial_Schema extends CI_Migration {

    public function __construct() {
        @ini_set('max_execution_time', 0);
        @ini_set('memory_limit','2048M');

        $this->load->helper("foreign_key");

        $this->load->library('usuario');
        $this->load->library('conteudo');
        $this->load->library('exercicio');
        $this->load->library('exemplo');
        $this->load->library('anotacao');
    }

    public function up() {

        // $this->down();
        
        $attributes = array('ENGINE' => 'InnoDB');

        $this->dbforge->add_field( $this->usuario->schema() );
        $this->dbforge->add_key('id', TRUE );
        $this->dbforge->create_table('usuarios', TRUE, $attributes );

        $this->dbforge->add_field( $this->conteudo->schema() );
        $this->dbforge->add_key('id', TRUE );
        $this->dbforge->create_table('conteudos', TRUE, $attributes );

        $this->dbforge->add_field( $this->exercicio->schema() );
        $this->dbforge->add_key('id', TRUE );
        $this->dbforge->create_table('exercicios', TRUE, $attributes );

        $this->dbforge->add_field( $this->exemplo->schema() );
        $this->dbforge->add_key('id', TRUE );
        $this->dbforge->create_table('exemplos', TRUE, $attributes );

        $this->dbforge->add_field( $this->anotacao->schema() );
        $this->dbforge->add_key('id', TRUE );
        $this->dbforge->create_table('anotacoes', TRUE, $attributes );

        $this->db->query( add_foreign_key('exercicios', 'idConteudo', 'conteudos(id)', 'CASCADE', 'CASCADE') );
        $this->db->query( add_foreign_key('exemplos', 'idConteudo', 'conteudos(id)', 'CASCADE', 'CASCADE') );
        $this->db->query( add_foreign_key('anotacoes', 'idConteudo', 'conteudos(id)', 'CASCADE', 'CASCADE') );
    }

    public function down() {
        $this->db->query( drop_foreign_key('exercicios', 'idConteudo') );
        $this->db->query( drop_index('exercicios', 'idConteudo') );

        $this->db->query( drop_foreign_key('exemplos', 'idConteudo') );
        $this->db->query( drop_index('exemplos', 'idConteudo') );

        $this->db->query( drop_foreign_key('anotacoes', 'idConteudo') );
        $this->db->query( drop_index('anotacoes', 'idConteudo') );

        $this->dbforge->drop_table('usuarios', TRUE );
        $this->dbforge->drop_table('conteudos', TRUE );
        $this->dbforge->drop_table('exercicios', TRUE );
        $this->dbforge->drop_table('exemplos', TRUE );
        $this->dbforge->drop_table('anotacoes', TRUE );
    }
}