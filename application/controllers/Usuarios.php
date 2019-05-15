<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->template->set_template("templates/template");
    }

    public function cadastrar() {

        $this->load->library('usuario');
        $this->load->model('usuarios_model');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('matricula', 'Matrícula', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if( $this->form_validation->run() ) {

            $usuario = new Usuario;
            $usuario->fill( $this->input->post() )
                    ->set('senha', md5( $this->input->post('senha') ) )
                    ->set('perfil', 'A');

            $this->usuarios_model->inserir( $usuario );

            redirect('/login');
        }

        $this->template->load_view('cadastrar-view');
    }
}
