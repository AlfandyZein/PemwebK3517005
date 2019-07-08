<?php
class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		// cek keberadaan session 'username'	
		if (!isset($_SESSION['username'])){
			// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
			redirect('login');
		}
	}


	// method hapus data buku berdasarkan id
	public function delete($id){
		$this->user_model->delete($id);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/user');
	}

	// method untuk tambah data buku
	public function insert(){

		// baca data dari form insert buku
		$username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $data = array("username"=>$username,"fullname"=>$fullname,"role"=>$role,"password"=>$password);

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->user_model->insert($data);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/user');
	}

    public function edit($id){
        $getUser = $this->user_model->getUserProfile($id);

        $data['fullname'] = $_SESSION['fullname'];

        $data['username'] = $getUser['username'];
        $data['fullname'] = $getUser['fullname'];
        $data['role'] = $getUser['role'];
        $data['password'] = $getUser['password'];
        $data['user'] = "";
        $data['stsUpload'] = "edit/".$data['username'];

        $data['roles'] = $this->kategori_model->getRole();

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/user', $data);
        $this->load->view('dashboard/footer');
    }

    public function update(){

		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$idrole = $_POST['idrole'];
		$password = $_POST['password'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->user_model->updateUser($username, $fullname, $idrole, $password);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addUser');
	}

	// method untuk mencari data buku berdasarkan 'key'
	public function findbooks(){
		
		// baca key dari form cari data
		$key = $_POST['key'];

		// ambil session fullname untuk ditampilkan ke header
		$data['fullname'] = $_SESSION['fullname'];

		// panggil method findBook() dari model book_model untuk menjalankan query cari data
		$data['book'] = $this->book_model->findBook($key);

		// tampilkan hasil pencarian di view 'dashboard/books'
		$this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/books', $data);
        $this->load->view('dashboard/footer');
	}

}
?>