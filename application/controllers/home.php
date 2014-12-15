<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CustomController {
	
	function __construct() {
		parent::__construct();
		$this->load->model('Banner');
	}

	public function index() {
		$this->data['banners'] = $this->Banner->getAll();

		var_dump($this->Banner->getAll());
		die;

		$this->load->view('home', $this->data);
	}
}

?>