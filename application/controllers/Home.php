<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$data['admin_css'] = 'assets/css/sb-admin.css';
		// sidebar active
		$data['is_active'] = 'active';

		$this->load->view('templates/Header.php', $data);
		$this->load->view('templates/Sidebar.php');
		$this->load->view('index');
		$this->load->view('templates/Footer.php');
	}
}
