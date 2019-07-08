<?php
class NewKategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		// cek keberadaan session 'username'	
		if (!isset($_SESSION['username'])){
			// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
			redirect('login');
		}
	}


	// method untuk edit data buku berdasarkan id
	public function update(){
   		// baca data dari form insert buku
   		$idkategori = $_POST['idkategori'];
		$kategori = $_POST['kategori'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->kategori_model->updateKategori($idkategori, $kategori);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addKategori');

	}


	// method untuk edit data buku berdasarkan id
	public function edit($idkategori){
        $data['view_category'] = $this->Kategori_model->showKategori($idkategori);

        $data['fullname'] = $_SESSION['fullname'];

        if (empty($data['view_category'])){
            show_404();
        }

        $data['idkategori'] = $data['view_category']['idkategori'];
        $data['kategori'] = $data['view_category']['kategori'];

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/editkategori', $data);
        $this->load->view('dashboard/footer');
    }



	// method hapus data buku berdasarkan id
	public function delete($idkategori){
		$this->load->model('Kategori_model');
		$this->Kategori_model->delKategori($idkategori);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/kategori');
	}


// method untuk tambah data buku
	public function insert(){

		

		// baca data dari form insert buku
		$judul = $_POST['judul'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->kategori_model->insertKategori($judul);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/kategori');
		
	}
}



?>