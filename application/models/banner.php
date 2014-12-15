<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Model {

    // sets up variables that will be used in the model
    var $table_name = 'banners';
    var $table_pk = 'banner_id';
    var $image_upload_path = BANNERS_UPLOAD_PATH;

    function __construct() {
        parent::__construct();
    }
   
    public function save($data) {
        $id = $this->input->post('banner_id');

        SetData('link');
        
        if (!empty($id)) {
            if (is_string($data)) {
                $this->deleteImage($id);
                $this->db->set('img',$data);
            }
            $this->db->where('banner_id',$id);
            return $this->db->update('banners');
        }
        else {
            $this->db->set('order', $this->getLastOrder());
            $this->db->set('img', $data);
            return $this->db->insert($this->table_name);
        }
    }
    
    public function choose_order($id, $up) {
        $item = $this->get($id);
        $order = $item->order;
        if ($up) {  
            $item = $this->getByOrder($order - 1);
            $this->do_order($id, false);
            $this->do_order($item->banner_id, true);
        }
        else {
            $item = $this->getByOrder($order + 1);
            $this->do_order($id, true);
            $this->do_order($item->banner_id, false);
        }
        return true;
    }
    
    public function do_order($id, $down) {
         $image = $this->get($id);
    
         if ($down) {
            $image->order++;
         }
         else {
            $image->order--;
         }
         $this->db->set('order',$image->order);
         $this->db->where($this->table_pk, $id);
         return $this->db->update($this->table_name);
    }
   
    public function get($id=0) {
        if (!empty($id)) {
            $this->db->where($this->table_pk,$id);
            $query = $this->db->get($this->table_name);
            return $query->row();
        }
        return FALSE;
    }
   
    public function getAll($init=0, $finit=0) {
        $this->db->select('*');
        $this->db->order_by('order', 'asc');
        $query = ($finit == 0) ? $this->db->get($this->table_name) : $this->db->get($this->table_name, $finit, $init);
        return $query->result();
    }
    
    public function getByOrder($order=0) {
        if (!empty($order)) {
            $this->db->where('order', $order);
            $query = $this->db->get($this->table_name);
            return $query->row();
        }
        return FALSE;
    }
    
    public function getLastOrder() {
        $this->db->select('order');
        $this->db->from($this->table_name);
        $this->db->order_by('order', 'desc');
        $query = $this->db->get();
        $row = $query->row();
        
        return (empty($row))? 1 : $row->order + 1;
    }
    
    private function deleteImage($id) {
        if (!empty($id)) {
            $item = $this->get($id);
            if (!empty($item->img)) {  
                @unlink($this->image_upload_path.$item->img);
            }
            return TRUE;
        }
        return FALSE;
    }
    
    public function delete($id) {
        if (!empty($id)) {
            $item = $this->get($id);
            $items = $this->getAll();
            
            //reorder
            foreach($items as $i) {
                if($i->order > $item->order) {
                    $order = $i->order;
                    $order--;
                    $this->db->where($this->table_pk, $i->banner_id);
                    $this->db->set('order', $order);
                    $this->db->update('banners');
                }
            }
            $this->deleteImage($id);
            $this->db->where($this->table_pk, $id);
            return  $this->db->delete($this->table_name);
        }
        return FALSE;
    }
}