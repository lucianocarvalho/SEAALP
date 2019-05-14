<?php

/**
 * Classe para a criação de todo o banco de dados do projeto.
 * @author Luciano Junior <luciano@lucianojunior.com.br>
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	/**
	 * Método para a migração.
	 */
	public function index() {
        $this->load->library('migration');

        if ( ! $this->migration->current() ) {
            echo 'Erro ' . $this->migration->error_string();
        } else {
            echo 'Migração realizada com sucesso';
        } 
    }
}
