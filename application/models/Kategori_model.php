<?php

class Kategori_model extends CI_Model {

	// method untuk menampilkan data buku
	public function showKategori($id = false){
		// membaca semua data buku dari tabel 'books'
		if ($id == false){
			$query = $this->db->get('category');
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('books', array("idbuku" => $id));
			return $query->row_array();
		}
	}

	public function getRole(){
		$query = $this->db->get('role');
		return $query->result_array();
	}


	// method untuk edit data buku berdasarkan id
	public function updateKategori($idkategori, $kategori){
		// membaca semua data buku dari tabel 'books'
			$this->db->update('kategori',array("kategori"=>$kategori),"idkategori=$idkategori");
	}

	// method untuk edit data buku berdasarkan id
	public function editKategori($idkategori){
		$this->db->edit('category', array("idkategori" => $idkategori));
	}



	// method untuk hapus data buku berdasarkan id
	public function delKategori($idkategori){
		$this->db->delete('category', array("idkategori" => $idkategori));
	}

	// method untuk mencari data buku berdasarkan key
	public function findBook($key){

		$query = $this->db->query("SELECT * FROM books WHERE judul LIKE '%$key%' 
									OR pengarang LIKE '%$key%' 
									OR penerbit LIKE '%$key%'
									OR sinopsis LIKE '%$key%'
									OR thnterbit LIKE '%$key%'");
		return $query->result_array();
	}

	// method untuk insert data buku ke tabel 'books'
	public function insertKategori($judul){
		$data = array(

					#"idkategori" => $idkategori,
					"kategori" => $judul
		);
		$query = $this->db->insert('category', $data);
	}

	// method untuk membaca data kategori buku dari tabel 'kategori'
	public function getCategory(){
		$query = $this->db->get('category');
		return $query->result_array();
	}

	// method untuk menghitung jumlah buku berdasarkan idkategori
	public function countByCat($idkategori){
		$query = $this->db->query("SELECT count(*) as jum FROM books WHERE idkategori = '$idkategori'");
		return $query->row()->jum;
	}

}
?>