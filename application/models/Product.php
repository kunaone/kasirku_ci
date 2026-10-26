<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model{

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function get_product($id = NULL)
    {
        if($id === NULL){
            
            $this->db->order_by('updated_at desc, created_at desc');

            $query = $this->db->get('products');

            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                echo 'Data Product Kosong';
            }
        }

        $this->db->select('products.*, fk_supplier_product.supplier_id');
        $this->db->join('fk_supplier_product', 'fk_supplier_product.product_id = products.id', 'left'); //left join
        $this->db->where('products.id', $id);

        $query = $this->db->get('products');
        

        return $query->row_array();
    }

    public function insert_product($product_img)
    {
        $now = date('Y-m-d H:i:s', now());

        $this->db->trans_start();

        $data_prod = array(
            'name_product' => $this->input->post('product'),
            'sell_price' => $this->input->post('price'),
            'qty_stock' => $this->input->post('stock'),
            'img_prod' => $product_img,
            // upload gambar
            'created_at' => $now
        );

        $this->db->insert('products', $data_prod);

        $data_supp = array(
            'supplier_id' => $this->input->post('supplier_id', TRUE),
            'product_id' => $this->db->insert_id(),
        );

        $this->db->insert('fk_supplier_product', $data_supp);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }

    public function update_product($id, $product_img = NULL)
    {
        $now = date('Y-m-d H:i:s', now());

        $this->db->trans_start();

        $data = array(
            'name_product' => $this->input->post('product'),
            'sell_price'   => $this->input->post('price'),
            'qty_stock'    => $this->input->post('stock'),
            'updated_at'   => $now
        );

        if ($product_img !== NULL) {
            $data['img_prod'] = $product_img;
        }

        $this->db->where('id', $id)->update('products', $data);

        $this->db->where('product_id', $id)->update('fk_supplier_product', array(
            'supplier_id' => $this->input->post('supplier_id', TRUE)
        ));

        $this->db->trans_complete();

        return $this->db->trans_status();

    }

}

?>