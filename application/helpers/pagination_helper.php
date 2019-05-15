<?php

/**
 * Helper para configurar as paginações na maioria das listagem.
 * 
 * @author Luciano Junior <luciano@lucianojunior.com.br>
 */

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('build_pagination') ) {

	/**
	 * Função para criar a paginação
	 * @param string 	$controller 	O módulo de listagem.
	 * @return int 		$total 			O total de registros.
	 */
	function build_pagination( $controller, $total, $gets = false ) {	

		$base_url = base_url( $controller );

		/**
		 * Algorítmos para adicionarmos os GET's na paginação.
		 */
		if( is_array( $gets ) && ! empty( $gets ) ) {

			$count = 0;
			$count_gets = 0;

			// Contamos quantos parâmetros do $gets serão inseridos.
			foreach( $gets as $get ) {
				if( $get != false )
					$count_gets++;
			}

			// Agora sim percorremos para inserir.
			foreach( $gets as $keys=>$values ) {

				// Se o valor for falso, ele nem adiciona na URL e já pula pra próxima.
				if( $values == false || strlen( $values ) == 0 )
					continue;

				// Se for o primeiro indice, adiciona o ? do PHP para indicar que irá receber parâmetros GET.
				if( $count == 0 )
					$base_url .= '?';

				// Adicionamos na URL os valores dos arrays e seus índices.
				$base_url .= $keys;
				$base_url .= '=';

				// Trocamos espaços por + para o CodeIgniter entender melhor.
				$values = str_replace(' ', '+', $values );
				$base_url .= $values;

				$count++;

				// Se existem mais parâmetros, adiciona o & comercial.
				if( $count < $count_gets )
					$base_url .= '&';

			}
		}

		$ci = &get_instance();
		$ci->load->library('pagination');

		$config['reuse_query_string'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['base_url']    = $base_url;
		$config['total_rows']  = $total;
		$config['per_page']    = $gets['quantity'];
		$config["uri_segment"] = 3;
		$config["attributes"] = array( "class" => "page-link" );

		$config['full_tag_open'] = '<ul class="pagination">';
    	$config['full_tag_close'] = '</ul>';

    	$config['first_link'] = '&laquo; Primeiro';
    	$config['first_tag_open'] = '<li class="page-item">';
    	$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Último &raquo;';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Próximo &rarr;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Anterior';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a class="page-link" href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$ci->pagination->initialize( $config );
		return $ci->pagination->create_links();
	}
}