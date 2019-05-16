<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exercicios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('exercicio');
        $this->load->model('exercicios_model');
		$this->template->set_template("templates/template");
    }

    public function index() {
        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;
        
		$data['exercicios'] 		= $this->exercicios_model->buscar( $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->exercicios_model->buscar( $data['search'], "count" );

        $data['paginacao'] = build_pagination(
			'admin/exercicios',
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );
        
        $this->template->load_view('exercicios/index-view', $data );
    }

    public function cadastrar() {

        $this->load->model('conteudos_model');

        $data['conteudos'] = $this->conteudos_model->listar();

        $this->form_validation->set_rules('enunciado', 'Enunciado', 'required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'required');

        if( $this->form_validation->run() ) {

            $exercicio = new Exercicio;
            $exercicio->fill( $this->input->post() );
            
            $id = $this->exercicios_model->inserir_id( $exercicio );

            redirect('/admin/exercicios/redigir/' . $id );
        }

        $this->template->load_view('exercicios/cadastrar-view', $data );
    }

    public function redigir( $id ) {

        $data['exercicio'] = $this->exercicios_model->selecionar( $id );

        if( $this->input->server('REQUEST_METHOD') == 'POST') {

            // Carregamos as classes
            $this->load->library( array(
                'multipla_escolha', 'certo_errado', 'lacuna', 'bloco'
            ) );

            $this->load->model( array(
                'multipla_escolha_model', 'certo_errado_model', 'lacunas_model'
            ) );

            // Múltipla escolha
            if( $data['exercicio']->tipo == "ME" ) {
                $array = array();

                foreach( $this->input->post('alternativas') as $key=>$alternativa ) {
                    $me = new Multipla_escolha;
                    $me->set('idExercicio', $this->input->post('idExercicio') )
                        ->set('texto', $alternativa )
                        ->set('correta', isset( $this->input->post('corretas')[ $key ] ) ? 1 : 0 );
                    
                    $this->multipla_escolha_model->inserir( $me );
                }

                redirect('/admin/exercicios');
            }

            // Certo ou errado
            if( $data['exercicio']->tipo == "CE" ) {
                $ce = new Certo_errado;
                $ce->fill( $this->input->post() );
                $this->certo_errado_model->inserir( $ce );
                redirect('/admin/exercicios');
            }

            // Lacunas
            if( $data['exercicio']->tipo == "LA" ) {
                $la = new Lacuna;
                $la->fill( $this->input->post() )
                    ->set('respostas', serialize( explode(',', $this->input->post('respostas') ) ) );
                $this->lacunas_model->inserir( $la );
                redirect('/admin/exercicios');
            }
        }
        
        switch( $data['exercicio']->tipo ) {
            case "ME":
                $view = 'exercicios/cadastrar-me-view';
                break;
            case "CE":
                $view = 'exercicios/cadastrar-ce-view';
                break;
            case "LA":
                $view = 'exercicios/cadastrar-la-view';
                break;
        }

        $this->template->load_view( $view, $data );
    }
}
