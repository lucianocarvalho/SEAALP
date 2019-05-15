<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->template->set_template("templates/template");
    }

    public function index() {
        $this->template->load_view('dashboard-view');
    }

    public function admin() {
        $this->template->load_view('admin-view');
    }
}
