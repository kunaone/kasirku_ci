<?php

class Products extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model('Supplier');
        $this->load->model('Product');
    }

    public function index()
    {
        $data['products'] = $this->Product->get_product();
        
        $this->view('products_view', $data);
    }

    public function create()
    {

        $data['supplier'] = $this->Supplier->get_supplier();

        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required|is_natural_no_zero',
                                            array('is_natural_no_zero' => '*Silahkan Pilih %s!'));
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
            //Upload Image
            $config['upload_path']   = './assets/image/products/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $product_img = 'noimage.jpg';
            } else {
                $upload_data = $this->upload->data();
                $product_img = $upload_data['file_name'];
            }

            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');

            $this->Product->insert_product($product_img);
            redirect('products');
        }

        $this->view('add_product_view', $data);
    }

    public function edit($id)
    {
        $data['product']  = $this->Product->get_product($id);
        $data['supplier'] = $this->Supplier->get_supplier();

        if (empty($data['product'])) {
            show_404();
        }

        $this->view('edit_product_view', $data);
    }

    public function update($id, $product_img = NULL)
    {
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required|is_natural_no_zero',
                                            array('is_natural_no_zero' => '*Silahkan Pilih %s!'));
        $this->form_validation->set_rules('product', 'Nama Produk', 'trim|required',
                                            array('required' => '*%s Wajib Diisi!'));
        $this->form_validation->set_rules('price', 'Harga', 'trim|required|numeric',
                                            array('required' => '*%s Wajib Diisi!',
                                                'numeric'  => '*%s Kolom Hanya Berisi Angka'));
        $this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric',
                                            array('required' => '*%s Wajib Diisi!',
                                                'numeric'  => '*%s Kolom Hanya Berisi Angka'));

        if ($this->form_validation->run() === FALSE) {
            // validation errors are still available to the view in this request
            return $this->edit($id);
        }


        if (!empty($_FILES['userfile']['name'])) {
            $config['upload_path']   = './assets/image/products/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('products/edit/' . $id);
            } else {
                $upload_data = $this->upload->data();
                $product_img = $upload_data['file_name'];
            }

            // $product_img = $this->upload->data('file_name');
        }

        $this->Product->update_product($id, $product_img);

        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('products');
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