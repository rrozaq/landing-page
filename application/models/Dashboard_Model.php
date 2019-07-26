<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model {

	public function get_Subscriber()
	{
        return $this->db->count_all('subscribers');
    }

	public function get_Auth()
	{
        return $this->db->count_all('auth');
    }

}
