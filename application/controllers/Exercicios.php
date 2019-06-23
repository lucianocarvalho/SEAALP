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
        $this->load->model('conteudos_model');
        $data['conteudos']          = $this->conteudos_model->listar();

        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;
        $data['idConteudo'] 		= ( $this->input->get('idConteudo') ) ? $this->input->get('idConteudo') : NULL;

		$data['exercicios'] 		= $this->exercicios_model->buscar( $data['idConteudo'], $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->exercicios_model->buscar( $data['idConteudo'], $data['search'], "count" );

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
                'multipla_escolha_model', 'certo_errado_model', 'lacunas_model', 'blocos_model'
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
                $lacunas = array();
            
                foreach( json_decode( $this->input->post('respostas') ) as $lacuna )
                    $lacunas[] = $lacuna->value;
            
                $la = new Lacuna;
                $la->fill( $this->input->post() )
                    ->set('respostas', serialize( $lacunas ) );

                $this->lacunas_model->inserir( $la );
                redirect('/admin/exercicios');
            }

            if( $data['exercicio']->tipo == "BO" ) {

                $bloco = new Bloco;
                $bloco->fill( $this->input->post() );

                $this->blocos_model->inserir( $bloco );

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
            case "BO":
                $view = 'exercicios/cadastrar-bo-view';
                break;
        }

        $this->template->load_view( $view, $data );
    }

    public function listar_aluno() {

        $this->load->helper('exercise_helper');
        $this->load->model('conteudos_model');

        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;
        $data['idConteudo'] 		= ( $this->input->get('idConteudo') ) ? $this->input->get('idConteudo') : NULL;
        
        $data['conteudos']          = $this->conteudos_model->listar();
		$data['exercicios'] 		= $this->exercicios_model->buscar( $data['idConteudo'], $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	= $this->exercicios_model->buscar( $data['idConteudo'], $data['search'], "count" );

        $data['paginacao'] = build_pagination(
			'painel/exercicios',
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );

        $this->template->load_view('aluno/exercicios-view', $data );
    }

    public function realizar( $id ) {

        $this->load->model( array(
            'multipla_escolha_model', 'certo_errado_model', 'lacunas_model', 'blocos_model', 'conteudos_model', 'anotacoes_model'
        ));

        $data['exercicio'] = $this->exercicios_model->selecionar( $id );
        $data['conteudo'] = $this->conteudos_model->selecionar( $data['exercicio']->idConteudo );
        $data['anotacoes'] = $this->anotacoes_model->listar( $data['exercicio']->idConteudo );

        if( $data['exercicio']->tipo == "ME") {
            $data['alternativas'] = $this->multipla_escolha_model->selecionar( $id );
            $view = 'aluno/realizar-exercicio-me-view';
        } elseif( $data['exercicio']->tipo == "CE" ) {
            $view = 'aluno/realizar-exercicio-ce-view';
        } elseif( $data['exercicio']->tipo == "LA" ) {
            $data['lacunas'] = $this->lacunas_model->selecionar( $id );
            $view = 'aluno/realizar-exercicio-la-view';
        } elseif( $data['exercicio']->tipo == "BO" ) {
            $data['frase'] = $this->blocos_model->selecionar( $id );
            $view = 'aluno/realizar-exercicio-bo-view';
        }

        $this->template->load_view( $view, $data );
    }

    public function corrigir() {

        $this->load->library('user_agent');

        $this->load->model( array(
            'multipla_escolha_model', 'certo_errado_model', 'lacunas_model', 'blocos_model', 'conteudos_model', 'anotacoes_model'
        ));

        $data['exercicio'] = $this->exercicios_model->selecionar( $this->input->post('idExercicio') );
        $data['proximo_exercicio'] = $this->exercicios_model->proximoExercicio( $data['exercicio'] );

        if( 
            ( $data['exercicio']->tipo == "ME" && ! array_key_exists('alternativa', (array) $this->input->post() ) )  ||
            ( $data['exercicio']->tipo == "CE" && ! array_key_exists('alternativa', (array) $this->input->post() ) )  ||
            ( $data['exercicio']->tipo == "LA" && empty( $this->input->post('lacunas', TRUE ) ) )
        ) {
            $this->flashmessages->error('Você precisa responder o exercício.');
            redirect( $this->agent->referrer() );
            return;
        }

        if( $data['exercicio']->tipo == "ME") {
            $data['alternativas'] = $this->multipla_escolha_model->selecionar( $this->input->post('idExercicio') );
            $view = 'aluno/corrigir-exercicio-me-view';
        } elseif( $data['exercicio']->tipo == "CE" ) {
            $data['resposta'] = $this->certo_errado_model->selecionar( $this->input->post('idExercicio') );
            $view = 'aluno/corrigir-exercicio-ce-view';
        } elseif( $data['exercicio']->tipo == "LA" ) {
            $data['lacuna'] = $this->lacunas_model->selecionar( $this->input->post('idExercicio') );
            $view = 'aluno/corrigir-exercicio-la-view';
        } elseif( $data['exercicio']->tipo == "BO" ) {
            $data['frase'] = $this->blocos_model->selecionar( $this->input->post('idExercicio') );
            $view = 'aluno/corrigir-exercicio-bo-view';
        }

        // Salvamos na sessão para o botão de "Continuar de onde parei".
        $this->session->set_userdata( array(
            'proximoExercicio' => $data['proximo_exercicio']
        ) );

        $this->template->load_view( $view, $data );
    }

    public function visualizar( $id ) {
        $data['exercicio'] = $this->exercicios_model->selecionar( $id );

        $this->load->model( array(
            'multipla_escolha_model', 'certo_errado_model', 'lacunas_model', 'blocos_model'
        ));

        if( $data['exercicio']->tipo == "ME")
            $data['alternativas'] = $this->multipla_escolha_model->selecionar( $id );

        if( $data['exercicio']->tipo == "CE" )
            $data['resposta'] = $this->certo_errado_model->selecionar( $id );

        if( $data['exercicio']->tipo == "LA" )
            $data['lacuna'] = $this->lacunas_model->selecionar( $id );
        
        if( $data['exercicio']->tipo == "BO" )
            $data['frase'] = $this->blocos_model->selecionar( $id );

        $this->template->load_view('exercicios/visualizar-view', $data );
    }

    public function remover( $id ) {
        if( $this->exercicios_model->remover( $id ) )
            $this->flashmessages->success('Removido com sucesso!');

        redirect('/admin/exercicios');
    }
}
