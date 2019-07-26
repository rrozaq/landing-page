<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subscriber_Model');
    }
    

	public function index()
	{
        if(!$this->session->userdata('name')){
            redirect('auth','refresh');
        }
        $this->data["subscribers"] = $this->Subscriber_Model->get();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('subscriber', $this->data);
		$this->load->view('template/footer');
	}

	public function add()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'Email wajib di isi!'));

        if ($this->form_validation->run() == TRUE) {
            if($this->Subscriber_Model->add()){
                $this->session->set_flashdata('subscriber_success', 'Berhasil berlangganan!');
            } else {
                $this->session->set_flashdata('subscriber_failure', 'Gagal berlangganan!');
            }
        } else {
            $this->session->set_flashdata('subscriber_failure_email', 'Email wajib di isi!');
        }
        redirect('home','refresh');
    }

    public function delete($id)
    {
        if ($this->Subscriber_Model->delete($id)) {
            $this->session->set_flashdata('unsubscriber_success', 'Berhenti berlangganan berhasil!');
        } else {
            $this->session->set_flashdata('unsubscriber_success', 'Berhenti berlangganan gagal!');
        }
        
        redirect('home','refresh');
    }
}
