<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_Model');
		if(!$this->session->userdata('name')){
            redirect('auth','refresh');
        }
	}
	

	public function index()
	{
		$this->data["subscriber"] = $this->Dashboard_Model->get_Subscriber();		
		$this->data["auth"] = $this->Dashboard_Model->get_Auth();		

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $this->data);
		$this->load->view('template/footer');
	}
}
