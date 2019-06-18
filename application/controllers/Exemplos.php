<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('exemplo');
        $this->load->model('exemplos_model');
		$this->template->set_template("templates/template");
    }

    public function index( $id ) {

        $this->load->model('conteudos_model');

        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;
        
        $data['exemplos'] 			= $this->exemplos_model->buscar( $id, $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->exemplos_model->buscar( $id, $data['search'], "count" );
        $data['conteudo']           = $this->conteudos_model->selecionar( $id );

        $data['paginacao'] = build_pagination(
			'admin/exemplos/' . $id,
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );
        
        $this->template->load_view('exemplos/index-view', $data );
    }

    public function cadastrar( $id ) {

        $this->load->model('conteudos_model');

        $data['conteudo'] = $this->conteudos_model->selecionar( $id );

        $data['id'] = $id;
        $this->form_validation->set_rules('texto', 'texto', 'required');

        if( $this->form_validation->run() ) {

            $exemplo = new Exemplo;
            $exemplo->fill( array(
                'idConteudo' => $this->input->post('idConteudo', TRUE ),
                'texto' => nl2br( $this->input->post('texto', TRUE ) )
            ) );

            $this->exemplos_model->inserir( $exemplo );

            redirect('/admin/exemplos/' . $id );
        }

        $this->template->load_view('exemplos/cadastrar-view', $data );
    }

    public function visualizar( $id ) {
        $this->load->model('conteudos_model');
        $data['exemplo'] = $this->exemplos_model->selecionar( $id );
        $data['conteudo'] = $this->conteudos_model->selecionar( $data['exemplo']->idConteudo );
        $this->template->load_view('exemplos/visualizar-view', $data );
    }

    public function editar( $id ) {
        $this->load->model('conteudos_model');

        $data['exemplo'] = $this->exemplos_model->selecionar( $id );
        $data['conteudo'] = $this->conteudos_model->selecionar( $data['exemplo']->idConteudo );
        $data['id'] = $id;
        
        $this->form_validation->set_rules('texto', 'texto', 'required');

        if( $this->form_validation->run() ) {

            $exemplo = new Exemplo;
            $exemplo->fill( array(
                'id' => $this->input->post('id', TRUE ),
                'idConteudo' => $this->input->post('idConteudo'),
                'texto' => nl2br( $this->input->post('texto', TRUE ) )
            ) );

            $this->exemplos_model->atualizar( $exemplo );

            redirect('/admin/exemplos/' . $data['conteudo']->id );
        }

        $this->template->load_view('exemplos/editar-view', $data );
    }

    public function remover( $id ) {
        $this->load->library('user_agent');
        $previous_url = $this->agent->referrer();

        if( $this->exemplos_model->remover( $id ) )
            $this->flashmessages->success('Removido com sucesso!');

        redirect( $previous_url );
    }
}
