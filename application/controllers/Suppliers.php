<?php

class Suppliers extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier');
        $this->load->library('session');
    }

    public function index()
    {
        $data['suppliers'] = $this->Supplier->get_supplier();
        $this->view('suppliers_view', $data);
    }

    public function create()
    {   
        $this->form_validation->set_rules('supplier_name','Nama Supplier', 'trim|required',
                                            array('required' => '*%s Wajib Diisi!'));
        $this->form_validation->set_rules('contact_person','Contact Person', 'trim|required');
        $this->form_validation->set_rules('phone','No. Whatsapp', 'trim|required|numeric',
                                            array('required' => '*%s Wajib Diisi!',
                                                    'numeric' => '*%s Kolom Hanya Berisi Angka'));

                                                    
        if($this->form_validation->run() === FALSE){
            $data['notif'] = 'Sliahkan periksa kembali data yang dimasukkan';
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $this->Supplier->insert_supplier();
            redirect('suppliers/create');
        }
        
        $this->view('add_supplier_view', $data);
        
    }

    public function delete($id)
    {
        $this->Supplier->delete_row($id);
        redirect('suppliers');
    }

    public function edit($id)
    {
        $data['supplier'] = $this->Supplier->get_supplier($id);
        if(empty($data['supplier'])){
            show_404();
        }

        $this->view('edit_supplier_view', $data);
        
    }

    public function update()
    {
        $this->Supplier->update_supplier();
        redirect('suppliers');
    }

    private function view($page = 'suppliers_view', $data = array())
    {

        $data['admin_css'] = 'assets/css/sb-admin.css';

        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('pages/suppliers/'. $page, $data);
        $this->load->view('templates/Footer');
    }
}

?>