<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model {

    // sets up variables that will be used in the model
    var $table_name = 'categories';
    var $table_pk = 'category_id';

    
    function __construct() {
        parent::__construct();
    }
   

    public function save() {
        $id = $this->input->post('category_id');

        SetData('name');
        SetData('abbreviation');

        if (!empty($id)) {
            $this->db->where($this->table_pk, $id);
            return $this->db->update($this->table_name);
        }
        else {
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
   

    public function getAll() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
   

    public function delete($id) {
        if (!empty($id)) {
            $this->db->where($this->table_pk, $id);
            return  $this->db->delete($this->table_name);
        }
        return FALSE;
    }
}