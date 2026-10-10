<?php

class Products extends CI_Controller{

    public function index()
    {
        
        $this->view();
    }

    public function create()
    {
        $this->form_validation->set_rules('product','Nama Produk', 'trim|required',
                                            array('required' => '*%s Wajib Diisi!'));
        $this->form_validation->set_rules('price','Harga', 'trim|required|numeric',
                                            array('required' => '*%s Wajib Diisi!',
                                                    'numeric' => '*%s Kolom Hanya Berisi Angka'));
        $this->form_validation->set_rules('stock','Stok', 'trim|required|numeric',
                                            array('required' => '*%s Wajib Diisi!',
                                                    'numeric' => '*%s Kolom Hanya Berisi Angka'));

                                                    
        if($this->form_validation->run() === FALSE){
            $data['notif'] = 'Sliahkan periksa kembali data yang dimasukkan';
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $this->Product->insert_product();
            redirect('products');
        }
        
        $this->view('add_product_view', $data);
    }

    public function edit()
    {
        $this->view('edit_product_view');
    }

    private function view($page = 'products_view', $data = array())
    {

        $data['admin_css'] = 'assets/css/sb-admin.css';

        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('pages/products/'. $page);
        $this->load->view('templates/Footer');
    }
    
}

?>