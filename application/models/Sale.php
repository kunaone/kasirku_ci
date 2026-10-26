<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Model{
    
    private $_table = 'products';

    public function get_data_product($limit = NULL, $offset = NULL)
    {
            
        if ($limit !== NULL) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get($this->_table);
        
        return $query->result();

    }

    public function get_product_count()
    {
        $query = $this->db->get($this->_table);
        return $query->num_rows();
    }
}

?>