<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	
    private $data;
    private $template;
    private $CI;

    public function set_data( $data ) {
        $this->data = $data;
    }

    public function set_template( $name ) {
        $this->template = $name;
    }

    public function load_view( $view, $view_data = array(), $return = FALSE ) {
        $this->CI = & get_instance();
        $view_data['contents'] = $this->CI->load->view($view, $view_data, TRUE);
        $view_data['data_template'] = $this->data;
        return $this->CI->load->view( $this->template, $view_data, $return );
    }

}