<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->template->set_template("templates/template");
    }

    public function index() {
        $this->template->load_view('login-view');
    }

    public function auth() {
        $this->load->library('usuario');
        $this->load->model('usuarios_model');

        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if( $this->form_validation->run() ) {

            $usuario = new Usuario;
            $usuario->fill( $this->input->post() );
    
            $result = $this->usuarios_model->login( $usuario );
            
            if( $result ) {

                $data = array_merge(
                    array('auth' => TRUE ),
                    json_decode( json_encode( $result ), TRUE )
                );

                $this->session->set_userdata( $data );

                $this->flashmessages->success('Autenticado com sucesso!');

                redirect("/");
            } else {
                $this->flashmessages->error('Dados inválidos. Por favor, preencha os dados corretamente.');
            }
        }

        redirect('/login');
    }

    public function logout() {
        $userdata = $this->session->all_userdata();

		foreach( $userdata as $key=>$value ) {
			if ( $key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity' ) {
		    	$this->session->unset_userdata( $key );
			}
        }
        
		$this->session->sess_destroy();
		redirect('/');
    }
}
