<?php

class Start extends CustomController {
	var $get_text_menu = true;
	var $check_session = true;

	function __construct() {
		parent::__construct();
		$this->gerenciador = true;
	}

	public function index() {
		$this->load->view('cmspanel/start', $this->data);
	}
}

?>