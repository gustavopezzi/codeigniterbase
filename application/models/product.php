<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

    // sets up variables that will be used in the model
    var $table_name = 'products';
    var $table_pk = 'product_id';
    var $image_upload_path = PRODUCTS_UPLOAD_PATH;

    function __construct() {
        parent::__construct();
    }
   
    public function save($data) {
    	$id = $this->input->post('product_id');
        
    	SetData('code');
        SetData('name');
    	SetData('description');
        SetData('category_id');
        SetData('starred');

        if (!empty($id)) {
        	if (is_string($data)) {
    			$this->deleteImages($id, 'img');
        		$this->db->set('img', $data);
    		}
    		$this->db->where($this->table_pk, $id);
    		if (!$this->db->update($this->table_name))
    			return false;
    	}
    	else {
    		if (is_string($data)) {
    			$this->deleteImages($id, 'img');
    			$this->db->set('img', $data);
    		}

    		if (!($this->db->insert($this->table_name)))
    		    return false;
    		
    		$id = $this->db->insert_id();
    	}
    	return true;
    }
        
    
	public function get($id=0) {
		if (!empty($id)) {
			$this->db->where($this->table_pk, $id);
   			$query = $this->db->get($this->table_name);
   			return $query->row();
		}
		return FALSE;
   	}

    
	public function getAll($category_id=0) {
        if (!empty($category_id))
            $this->db->where('category_id', $age_id);

        $query = $this->db->get($this->table_name);
        return $query->result();
    }


    public function getAllByLine($line_id) {
        if (!empty($line_id)) {
            $this->db->select('*')
                     ->from('products')
                     ->join('products_lines', 'products.product_id = products_lines.product_id')
                     ->where('products_lines.line_id', $line_id);
            $query = $this->db->get();
            return $query->result();
        }
        else {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
    }


    public function getAllByCategory($category_id=0) {
        if (!empty($category_id)) {
            $this->db->select('*')
                     ->from('products')
                     ->where('products.category_id', $category_id);
            $query = $this->db->get();
            return $query->result();
        }
        else {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
    }


    public function getAllBySearch($text_to_search) {
        $text_to_search = str_replace("%20", " ", $text_to_search);

        if (!empty($text_to_search)) {
            $this->db->select('*')
                     ->from('products')
                     ->like('products.name', $text_to_search)
                     ->or_like('products.description', $text_to_search);
            $query = $this->db->get();
            return $query->result();
        }
        else {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
    }


    public function getStarred() {
        $this->db->where('starred', 1);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
    
    public function getTotal($category_id=0) {
        $this->db->select('count(*) as total');
        
        if ($category_id > 0)
            $this->db->where('category_id', $age_id);
        
        $query = $this->db->get($this->table_name);
        $row = $query->row();
        return $row->total;
    }
   	

	private function deleteImages($id, $column="") {
    	if (!empty($id)) {
            $item = $this->get($id);
			
            if (empty($type) || $column=="img")
                if(!empty($item->img))
				    @unlink(PRODUCTS_UPLOAD_PATH.$item->img);
			return TRUE;
    	}
    	return FALSE;
    }

		   	
	public function delete($id) {
    	if (!empty($id)) {
	    	$product = $this->get($id);
		 	$products = $this->getAll();
		    
		 	$this->deleteImages($id);

            // delete icons
		 	$this->load->model('ProductIcon');
		 	$icons = $this->ProductIcon->getAll($id);
    		foreach ($icons as $icon)
		 		$this->ProductIcon->delete($icon->product_icon_id);
    		
		 	$this->db->where($this->table_pk, $id);
	    	return $this->db->delete($this->table_name);
    	}
    	return FALSE;
    }
}