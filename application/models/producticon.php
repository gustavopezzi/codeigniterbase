<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductIcon extends CI_Model {

    var $table_name = 'products_icons';
    var $table_pk = 'product_icon_id';


    function __construct() {
        parent::__construct();
    }


    public function save($data) {
        $id = $this->input->post('product_icon_id');
        $product_id = $this->input->post('product_id');
        
        SetData('title');
        
        if (!empty($id)) {
            if (is_array($data)) {
                $this->deleteImage($id);
                $this->db->set('img', $data['img']);
            }
            $this->db->where($this->table_pk, $id);
            return $this->db->update($this->table_name);
        }
        else {
            $this->db->set('product_id', $product_id);
            $this->db->set('img', $data);
            return $this->db->insert($this->table_name);
        }
    }
   

    public function get($id=0) {
        if (!empty($id)) {
            $this->db->where($this->table_pk, $id);
            $query = $this->db->get($this->table_name);
            return $query->row();
        }
        return FALSE;
    }
    

    public function getAll($product_id) {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    
    public function getProductIcons($product_id) {
        $this->db->select('*') 
                 ->where('product_id', $product_id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }


    private function deleteImage($id) {
        if (!empty($id)) {
            $item = $this->get($id);
            if (!empty($item->img)) {
                @unlink(PRODUCTS_UPLOAD_PATH.$item->product_id.'/'.$item->img);
            }
            return TRUE;
        }
        return FALSE;
    }
    

    public function delete($id) {
        if (!empty($id)) {
            $this->deleteImage($id);
            $this->db->where($this->table_pk, $id);
            return $this->db->delete($this->table_name);
        }
        return FALSE;
    }
    

    public function countItems($product_id){
        $this->db->select('count(*) as total');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get($this->table_name);
        $row = $query->row();
        return $row->total;
    }
}