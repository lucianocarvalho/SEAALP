<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anotacoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('anotacao');
        $this->load->model('anotacoes_model');
        $this->template->set_template("templates/template");
    }

    public function index() {

        $id = $this->session->userdata('id');

        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;

		$data['anotacoes'] 		    = $this->anotacoes_model->buscar( $id, $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->anotacoes_model->buscar( $id, $data['search'], "count" );

        $data['paginacao'] = build_pagination(
			'painel/anotacoes',
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );
        
        $this->template->load_view('aluno/listar-anotacoes-view', $data );
    }

    public function cadastrar( $id ) {
        $this->load->model('conteudos_model');
        $data['conteudo'] = $this->conteudos_model->selecionar( $id );

        $this->form_validation->set_rules('texto', 'Texto', 'required');

        if( $this->form_validation->run() ) {
            $anotacao = new Anotacao;
            $anotacao->fill( $this->input->post() );

            $this->anotacoes_model->inserir( $anotacao );

            redirect('painel/conteudos/visualizar/' . $id );
        }

        $this->template->load_view('aluno/cadastrar-anotacao-view', $data );
    }

    public function editar( $id ) {
        $data['anotacao'] = $this->anotacoes_model->selecionar( $id );

        $this->form_validation->set_rules('texto', 'Texto', 'required');

        if( $this->form_validation->run() ) {

            $anotacao = new Anotacao;
            $anotacao->fill( $data['anotacao'] );
            $anotacao->fill( $this->input->post() );

            $this->anotacoes_model->atualizar( $anotacao );

            redirect('painel/conteudos/visualizar/' . $anotacao->getIdConteudo() );
        }

        $this->template->load_view('aluno/editar-anotacao-view', $data );
    }

    public function remover( $id ) {
        $data['anotacao'] = $this->anotacoes_model->selecionar( $id );
        $this->anotacoes_model->remover( $id );
        redirect('painel/conteudos/visualizar/' . $data['anotacao']->idConteudo );
    }
}
