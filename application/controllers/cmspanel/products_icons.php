<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class Products_Icons extends CustomController {

	var $controller_name;
	var $model_id;
	var $model_class;


	function __construct() {
		parent::__construct();
		$this->load->model('Product');
		$this->load->model('ProductIcon');
		$this->load->library('image_lib');

		// sets up variables that will be used in the controller
		$this->controller_name = 'products_icons';
		$this->model_id = 'product_icon_id';
		$this->model_class = $this->ProductIcon;
		$this->data['controller'] = $this->controller_name;
	}
	

	public function index($id=0) {
		$this->data['product'] = $this->Product->get($id);
		$this->data['product_id'] = $id;
		$this->data['items'] = $this->model_class->getAll($id);
		$this->load->view(CMSPANELFOLDER.'products/icons/index', $this->data);
	}

	
	public function add($product_id=0) {
		$this->data['product'] = $this->Product->get($product_id);
		$this->data['product_id'] = $product_id;
		$this->load->view(CMSPANELFOLDER.'products/icons/form', $this->data);
	}
	

	public function edit($id=0, $product_id=0) {
		if (!empty($id)) {
			$this->data['product'] = $this->Product->get($product_id);
			$this->data['product_id'] = $product_id;
			$this->data['item'] = $this->model_class->get($id);
			$this->load->view(CMSPANELFOLDER.'products/icons/form', $this->data);
		}
		else {
			$this->setMessage("Invalid item!", true);
			$this->index($product_id);
		}
	}

	
	public function save() {
		$id = $this->input->post($this->model_id);
		$product_id = $this->input->post('product_id');
		
		$upload_data = $this->do_upload(PRODUCTS_UPLOAD_PATH.$product_id, 'img_file', 50, 50);
		
		if ($upload_data) {
			if ($this->model_class->save($upload_data)) {
				$this->setMessage("Item saved successfully!");
				$this->index($product_id);
			}
			else {
				$this->setMessage("Error saving item!", true);
				(!empty($id))? $this->edit($id, $product_id) : $this->add($product_id);
			}
		}
		else {
			(!empty($id))? $this->edit($id, $product_id) : $this->add($product_id);
		}		
	}

	
	public function delete($id=0, $product_id=0) {
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
}

?>