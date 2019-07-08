<?php

class User_model extends CI_Model {

	// method untuk menampilkan data buku
	public function getUserProfile($username = false){
		// membaca semua data buku dari tabel 'books'
		if ($username == false){
			$query = $this->db->get('users');
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('users', array("username" => $username));
			return $query->row_array();
		}
	}

	public function insert($data){
		$query = $this->db->insert("users",$data);
	}

	public function delete($data){
		$query = $this->db->delete("users",array("username"=>$data));
	}

	public function edit($username,$data){
		$query = $this->db->edit("users",$data,array("username"=>$username));
	}
}
?>