<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->library('usuario');
		$this->template->set_template("templates/template");
    }

    public function index() {
        
        $data['quantity']           = 10;
        $data['pagina'] 			= ( $this->input->get('per_page') ) ? $this->input->get('per_page') : 0;
        $data['search'] 			= ( $this->input->get('search') ) ? $this->input->get('search') : FALSE;

		$data['alunos'] 		    = $this->usuarios_model->buscar( "A", $data['search'], NULL, $data['quantity'], $data['pagina'] );
		$data['total_registros']	    = $this->usuarios_model->buscar( "A", $data['search'], "count" );

        $data['paginacao'] = build_pagination(
			'master/alunos',
			$data['total_registros'],
			array(
				'search' => $data['search'],
				'quantity' => $data['quantity']
			)
        );
        
        $this->template->load_view('master/alunos-view', $data );
    }

    public function cadastrar() {
        if( $this->usuarios_model->existeUsuario( $this->input->post('email') ) ) {
            $this->flashmessages->error('Já existe um usuário cadastrado com esse e-mail.');
            redirect('/master/alunos/cadastrar');
        }
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if( $this->form_validation->run() ) {

            $usuario = new Usuario;
            $usuario->fill( $this->input->post() );
            $usuario->fill([
                'senha' => md5( $this->input->post('senha', TRUE ) )
            ]);

            $this->usuarios_model->inserir( $usuario );

            redirect('/master/alunos');
        }

        $this->template->load_view('master/cadastrar-aluno-view');
    }

    public function editar( $id ) {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required');

        $data['aluno'] = $this->usuarios_model->selecionar( $id );
        
        if( $this->form_validation->run() ) {

            $usuario = new Usuario;
            $usuario->fill( $data['aluno'] );
            
            $usuario->fill([
                'nome' => $this->input->post('nome'),
                'sexo' => $this->input->post('sexo'),
                'matricula' => $this->input->post('matricula'),
                'email' => $this->input->post('email'),
                'senha' => ( $this->input->post('senha') ) ? md5( $this->input->post('senha', TRUE ) ) : $data['aluno']->senha
            ]);

            $this->usuarios_model->atualizar( $usuario );

            redirect('/master/alunos');
        }

        $this->template->load_view('master/editar-aluno-view', $data );
    }

    public function remover( $id ) {

        if( $this->usuarios_model->remover( $id ) )
            $this->flashmessages->success('Removido com sucesso!');

        redirect('/master/alunos');
    }

    public function visualizar( $id ) {
        $data['aluno'] = $this->usuarios_model->selecionar( $id );
        $this->template->load_view('master/visualizar-aluno-view', $data );
    }
}
