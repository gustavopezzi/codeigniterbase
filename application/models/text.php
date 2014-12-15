<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Text extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $query = $this->db->get('texts');
        return $query->result();
    }
}