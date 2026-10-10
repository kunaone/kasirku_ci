<?php
    class Pages extends CI_Controller{
        
        public function view($page = 'home')
        {
            if(!file_exists(APPPATH . 'views/pages/' . $page . ".php")){
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['admin_css'] = 'assets/css/sb-admin.css';

            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/Footer');
        }
    }

?>  