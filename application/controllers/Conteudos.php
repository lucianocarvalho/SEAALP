<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conteudos extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
        $this->template->load_view('dashboard-view');
    }
}
