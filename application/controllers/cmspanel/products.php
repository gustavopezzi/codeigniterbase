<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class Products extends CustomController {
	    
	var $controller_name;
	var $model_id;
	var $model_class;


	function __construct() {
		parent::__construct();
		$this->load->model('Product');
        $this->load->model('Category');
        $this->load->model('ProductIcon');
        $this->load->library('image_lib');

        // sets up variables that will be used in the controller
		$this->controller_name = 'products';
		$this->model_id = 'product_id';
		$this->model_class = $this->Product;
		$this->data['controller'] = $this->controller_name;
	}

	
	public function index() {
		$this->data['items'] = $this->model_class->getAll();
        $this->data['categories'] = $this->Category->getAll();
        $this->load->view(CMSPANELFOLDER.$this->controller_name.'/index', $this->data);
	}
    
	
	public function add() {
	    $this->data['categories'] = $this->Category->getAll();
		$this->load->view(CMSPANELFOLDER.$this->controller_name.'/form', $this->data);
	}
	

	public function edit($id=0) {
		$this->data['categories'] = $this->Category->getAll();
        
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
		
		if ($val !== TRUE) {
			$this->setMessage($val, true);
			(!empty($id))? $this->edit($id) : $this->add();
		}
		else {
			$upload_data = $this->do_upload(PRODUCTS_UPLOAD_PATH, 'img_file', 840, 400);
			
			if ($upload_data) {
				if ($this->model_class->save($upload_data)) {
					$this->setMessage("Item saved successfully!");
					$this->index();
				}
				else {
					$this->setMessage("Error saving item!", true);
					(!empty($id))? $this->edit($id) : $this->add();
				}
			}
			else {
				(!empty($id))?$this->edit($id):$this->add();
			}
		}
	}


	public function delete($id=0) {
		if (!empty($id)) {
			if ($this->model_class->delete($id)) {
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
	      $this->form_validation->set_rules('name', 'Name', 'required');
	      $this->form_validation->set_rules('description', 'Description', 'required');
	      return ($this->form_validation->run() == FALSE)? validation_errors() : TRUE;
    }
}

?>