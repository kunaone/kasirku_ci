<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model{

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function insert_product()
    {
        $now = date('Y-m-d H:i:s', now());

        $data = array(
            'name_product' => $this->input->post('product'),
            'sell_price' => $this->input->post('price'),
            'qty_stock' => $this->input->post('stock'),
            // upload gambar
            'created_at' => $now
        );

        return $this->db->insert('products', $data);

    }
}

?>