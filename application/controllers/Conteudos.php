<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conteudos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('conteudo');
        $this->load->model('conteudos_model');
		$this->template->set_template("templates/template");
    }

    public function index() {

        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;
        
		$data['conteudos'] 			= $this->conteudos_model->buscar( $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->conteudos_model->buscar( $data['search'], "count" );

        $data['paginacao'] = build_pagination(
			'admin/conteudos',
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );
        
        $this->template->load_view('conteudos/index-view', $data );
    }

    public function cadastrar() {

        $this->form_validation->set_rules('titulo', 'Título', 'required');
        $this->form_validation->set_rules('texto', 'Texto', 'required');

        if( $this->form_validation->run() ) {
            $conteudo = new Conteudo;
            $conteudo->fill( $this->input->post() );

            $this->conteudos_model->inserir( $conteudo );

            redirect('/admin/conteudos');
        }

        $this->template->load_view('conteudos/cadastrar-view');
    }

    public function visualizar( $id ) {
        $data['conteudo'] = $this->conteudos_model->selecionar( $id );
        $this->template->load_view('conteudos/visualizar-view', $data );
    }

    public function remover( $id ) {
        if( $this->conteudos_model->remover( $id ) )
            $this->flashmessages->success('Removido com sucesso!');

        redirect('/admin/conteudos');
    }

    public function visualizar_aluno( $id ) {
        $this->load->model( array('anotacoes_model', 'exemplos_model') );
        $data['conteudo'] = $this->conteudos_model->selecionar( $id );
        $data['anotacoes'] = $this->anotacoes_model->listar( $id );
        $data['exemplos'] = $this->exemplos_model->listar( $id );
        $this->template->load_view('aluno/visualizar-conteudo-view', $data );
    }
}
