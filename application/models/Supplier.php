<?php

class Supplier extends CI_Model{

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function get_supplier($id = NULL)
    {
        if($id === NULL){
            $query = $this->db->get('suppliers');
            
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                echo 'Data Supplier Kosong';
            }
        }

        $query = $this->db->get_where('suppliers', array('id' => $id));
        return $query->row_array();
    }

    public function insert_supplier()
    {
        $now = date('Y-m-d H:i:s', now());

        $data = array(
            'supplier_name' => $this->input->post('supplier_name'),
            'contact_person' => $this->input->post('contact_person'),
            'phone' => $this->input->post('phone'),
            'created_at' => $now
        );

        return $this->db->insert('suppliers', $data);

    }

    public function update_supplier()
    {
        $now = date('Y-m-d H:i:s', now());

        $data = array(
            'id' => $this->input->post('id'),
            'supplier_name' => $this->input->post('supplier_name'),
            'contact_person' => $this->input->post('contact_person'),
            'phone' => $this->input->post('phone'),
            'updated_at' => $now
        );

        $this->db->where('id', $data['id']);
        return $this->db->update('suppliers', $data);
    }

    public function delete_row($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('suppliers');
        return true;
    }
}

?>