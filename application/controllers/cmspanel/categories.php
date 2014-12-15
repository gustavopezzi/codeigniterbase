<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CustomController {

	var $controller_name;
	var $model_id;
	var $model_class;


	function __construct() {
		parent::__construct();
		$this->load->model('Category');

		// sets up variables that will be used in the controller
		$this->controller_name = 'categories';
		$this->model_id = 'category_id';
		$this->model_class = $this->Category;
		$this->data['controller'] = $this->controller_name;
	}

	
	public function index() {
		$this->data['items'] = $this->model_class->getAll();
		$this->load->view(CMSPANELFOLDER.$this->controller_name.'/index', $this->data);
	}

	
	public function add() {
		$this->load->view(CMSPANELFOLDER.$this->controller_name.'/form', $this->data);
	}
	

	public function edit($id=0) {
		if (!empty($id)) {
			$this->data['item'] = $this->model_class->get($id);
			$this->load->view(CMSPANELFOLDER.$this->controller_name.'/form', $this->data);
		}
		else {
			$this->setMessage("Invalid item!", true);
			$this->index();
		}
	}
	

	public function save() {
		$val = $this->validate_form();
		$id = $this->input->post($this->model_id);
		
		if ($this->model_class->save()) {
			$this->setMessage("Item saved successfully!");
			$this->index();
		}
		else {
			$this->setMessage("Error saving item!", true);
			(!empty($id))? $this->edit($id) : $this->add();
		}
	}
	

	public function delete($id=0) {
		if (!empty($id)) {
			if($this->model_class->delete($id)) {
				$this->setMessage("Item removed successfully!");
				$this->index();
			}
			else {
				$this->setMessage("Error removing item!", true);
				$this->index();
			}
		}
		else {
			$this->setMessage("Invalid item!", true);
			$this->index();
		}
	}
	
	private function validate_form() {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', ' ');
		return ($this->form_validation->run() == FALSE)? validation_errors() : TRUE;
	}
}

?>