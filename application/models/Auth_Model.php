<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {

	public function login()
	{
        $this->db->select('username, email, password');
        $this->db->from('auth');
        $this->db->where('auth.email', $this->input->post('email')
        );
        return $this->db->get('')->row();
    }
}
