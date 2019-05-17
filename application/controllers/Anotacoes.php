<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anotacoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('anotacao');
        $this->load->model('anotacoes_model');
        $this->template->set_template("templates/template");
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

    public function remover( $id ) {
        $this->load->library('user_agent');
        $previous_url = $this->agent->referrer();
        $this->anotacoes_model->remover( $id );
        redirect( $previous_url );
    }
}
