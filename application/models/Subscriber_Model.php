<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_Model extends CI_Model {

	public function get()
	{
        return $this->db->get('subscribers')->result();
    }

    public function add()
    {
        $data = ['email' => $this->input->post('email')];
        $this->db->insert('subscribers', $data);
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('subscribers.id', $id);
        $this->db->delete('subscribers');
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
