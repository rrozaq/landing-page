<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Auth_Model');
    }
    

	public function index()
	{
        $this->session->set_flashdata('redirect', current_url());
        $this->data["email"] = array(
            'class' => 'form-control form-control-user',
            'id' => 'exampleInputEmail',
            'type' => 'email',
            'name' => 'email',
            'placeholder' => 'Masukan Email . . . '
        );

        $this->data["password"] = array(
            'class' => 'form-control form-control-user',
            'id' => 'exampleInputPassword',
            'type' => 'password',
            'name' => 'password',
            'placeholder' => 'Kata Sandi'
        );

        $this->data["form"] = array(
            'class' => 'user'
        );

        $this->data["submit"] = array(
            'class' => 'btn btn-primary btn-user btn-block',
            'type' => 'submit',
            'name' => 'submit',
            'value' => 'Login'
        );
		$this->load->view('auth/index', $this->data);
    }
    
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === TRUE)
		{
            $query = $this->Auth_Model->login();
            if ($this->db->affected_rows() > 0)
			{        
                if(password_verify($this->input->post('password'), $query->password)){
                    $logged_in = [
                        'name' => $query->username,
                        'email' => $query->email
                    ];
                    $this->session->set_userdata($logged_in);
                    redirect('dashboard','refresh');
                } else{
                    $this->session->set_flashdata('message', 'Login gagal, password tidak cocok!');
                    redirect('auth', 'refresh');
                }
			}
			else
			{
				$this->session->set_flashdata('message', 'Login gagal, periksa kredensial!');
				redirect('auth', 'refresh');
			}

        } else {
            $this->session->set_flashdata('message', 'Email dan Password wajib diisi!');
            redirect('auth','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth','refresh');
    }
}
