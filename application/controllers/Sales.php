<?php

class Sales extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sale');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('/sales');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sale->get_product_count();
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '<span class="sr-only">(current)</span></a></li>';

        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';

        $config['next_link']       = '&raquo;';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';

        $config['prev_link']       = '&laquo;';
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';

        $this->pagination->initialize($config);
        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['products'] = $this->Sale->get_data_product($limit, $offset);
        $data['offset'] = $offset; 

        if(count($data['products']) > 0){
            $this->view('sales_view', $data);
        } else {
            show_404();
        }
    }

    private function view($page, $data = array())
    {

        $data['admin_css'] = 'assets/css/sb-admin.css';

        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('pages/sales/'. $page);
        $this->load->view('templates/Footer');
    }
}

?>