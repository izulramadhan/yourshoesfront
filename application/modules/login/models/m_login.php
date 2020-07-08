<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
    }	
    
    public function register($enc_password){
        // User data array
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
        );
     
        // Insert user
        return $this->db->insert('user_cust', $data);
    }

    function cek_session(){
        return $this->session->userdata('username');
    }
}