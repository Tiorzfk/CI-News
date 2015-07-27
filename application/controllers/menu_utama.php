<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_utama extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library();
		session_start();
	}

	function index()
	{
		$id_berita = $this->uri->segment(3);
		$data=array();
		$this->load->model('Model_utama');
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data["slide_berita"] = $this->Model_utama->Slide_Berita();
		$data["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();
		$data["berita_terbaru"] = $this->Model_utama->Berita_Terbaru();
		$data["tutorial_terbaru"] = $this->Model_utama->Tutorial_Terbaru();
		$data['itembanner']=$this->Model_utama->Itembanner();

		$this->load->view('main-web/bg_header',$data);
		$this->load->view('main-web/bg_content',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_footer',$data);
	}

function katberita()
	{
    	$page = $this->uri->segment(3);
		$page1 = $this->uri->segment(4);
		$limit_ti=3;
			if(!$page1):
			$offset_ti = 0;
			else:
			$offset_ti = $page1;
			endif;
			$this->load->model('Model_utama');
			$this->load->library('Pagination');
			$query=$this->Model_utama->Kategori_Berita($page,$limit_ti,$offset_ti);
			$judul_kategori = $this->Model_utama->Judul_Kategori_Berita($page);
			$kategori_berita = $this->Model_utama->Daftar_Kategori_Berita();
			$kategori_tutorial = $this->Model_utama->Daftar_Kategori_Tutorial();
			$berita_populer = $this->Model_utama->Berita_Populer();
			$tutorial_populer = $this->Model_utama->Tutorial_Populer();
			$tot_hal = $this->Model_utama->Total_Berita($page);

			foreach ($query->result() as $row)
					{

      		$config['base_url'] = base_url() . '/menu_utama/katberita/'.$row->id_kategori.'';}
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();

        $data2=array('query' => $query,'paginator' => $paginator,'page' => $page,'judul_kategori' => $judul_kategori,'kategori_berita' => $kategori_berita,'kategori_tutorial' => $kategori_tutorial,
		'berita_populer' => $berita_populer,'tutorial_populer' => $tutorial_populer);

		$this->load->view('main-web/bg_header',$data2);
		$this->load->view('main-web/kategori_berita',$data2);
		$this->load->view('main-web/bg_kanan',$data2);
		$this->load->view('main-web/bg_footer',$data2);
	}

	function kattutorial()
	{
		$id_kategori='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kategori='';
		}
		else
		{
    			$id_kategori = $this->uri->segment(3);
		}
		$data2=array();
		$this->load->model('Model_utama');
		$this->load->library('Pagination');
		$data2["judul_kategori"] = $this->Model_utama->Judul_Kategori_Tutorial($id_kategori);
		$data2["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data2["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data2["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data2["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();


        $data2["query"] = $this->Model_utama->Kategori_Tutorial($id_kategori);


		$this->load->view('main-web/bg_header',$data2);
		$this->load->view('main-web/kategori_tutorial',$data2);
		$this->load->view('main-web/bg_kanan',$data2);
		$this->load->view('main-web/bg_footer');
	}
		function detailberita()
	{

		$id_berita='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_berita='';
		}
		else
		{
    			$id_berita = $this->uri->segment(3);
		}
		$data=array();
		$this->load->model('Model_utama');
		$this->load->library('Pagination');

		$data["detail"]=$this->Model_utama->Detail_Berita($id_berita);
		$data["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();

		$this->Model_utama->Update_Counter_Berita($id_berita);
        	$data["query"] = $this->Model_utama->Tampil_Komentar_Berita($id_berita);
		$data["berita_terbaru"] = $this->Model_utama->Berita_Terbaru();
		$data["jumlah_komentar"] = $this->Model_utama->Jumlah_Komentar($id_berita);
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data["acak_berita"] = $this->Model_utama->Berita_Acak($id_berita);


		$this->load->view('main-web/bg_header',$data);
		$this->load->view('main-web/detail_berita',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_footer');
	}

	function detailtutorial()
	{

		$id_tutorial='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_tutorial='';
		}
		else
		{
    			$id_tutorial = $this->uri->segment(3);
		}
		$data=array();
		$this->load->model('Model_utama');

		$data["detail"]=$this->Model_utama->Detail_Tutorial($id_tutorial);
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();
		$data["acak_tutorial"] = $this->Model_utama->Tutorial_Acak($id_tutorial);

		$this->Model_utama->Update_Counter_Tutorial($id_tutorial);

		$this->load->view('main-web/bg_header',$data);
		$this->load->view('main-web/detail_tutorial',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_footer');
	}


	function kirimkomentar()
	{

	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){


		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('komentar','Komentar','required');
		$id_berita=$this->input->post('id_berita');
		$id_komen_berita=$this->input->post('id_komen_berita');
		$judul_berita=$this->input->post('judul_berita');
		$nama_kategori=$this->input->post('nama_kategori');
		$nama_non=$this->input->post('nama');
		$email_non=$this->input->post('email');
		$komentar_non=$this->input->post('komentar');
		$nama=strip_tags($nama_non);
		$email=strip_tags($email_non);
		$komentar=strip_tags($komentar_non);
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();

		if ($this->form_validation->run() == FALSE)
		{
			?>
			<script type="text/javascript">
			alert("Inputan tidak Valid!!! Ulangi lagi.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/detailberita/".$id_berita."'>";
		}
		else
		{
			$datainput2['nama_kategori']=$nama_kategori;
			$datainput2['status']='F';
			$datainput['nama_kategori']=$nama_kategori;
			$datainput['judul_berita']=$judul_berita;
			$datainput['id_berita']=$id_berita;
			$datainput2['nama']=$nama;
			$datainput2['email']=$email;
			$datainput2['tanggal']=mdate($tgl,$time);;
			$datainput2['waktu']=mdate($jam,$time);;
			$datainput2['nama']=$nama;
                        $datainput2['id_berita']=$id_berita;
			$datainput2['komentar']=$komentar;
			$this->load->model('Model_utama');
			$this->Model_utama->Simpan_Data($datainput,$datainput2);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/detailberita/".$id_berita."'>";

		}}else{
			?>
			<script type="text/javascript">
			alert("Anda harus login dahulu.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}

		function daftarlogin()
	{

		$this->load->view('main-web/daftar_login');

	}

	function simpan_daftarlogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('psw','Psw','required');
		$user_non=$this->input->post('username');
		$psw_non=$this->input->post('psw');
		$nama_non=$this->input->post('nama');
		$user=strip_tags($user_non);
		$psw=strip_tags($psw_non);
		$nama=strip_tags($nama_non);

		if ($this->form_validation->run() == FALSE)
		{
			?>
			<script type="text/javascript">
			alert("Inputan tidak Valid!!! Ulangi lagi.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/daftarlogin/'>";
		}
		else
		{
			$datainput['username']=$user;
			$datainput['psw']=$psw;
			$datainput['nama']=$nama;
			$datainput['status']='user';
			$this->load->model('Model_utama');
			$this->Model_utama->Simpan_Daftarlogin($datainput);
			echo "<font size='2' face='arial'>Sukses mendaftar.<br> Password anda: <b>".$psw."</b><br>
			Dengan username : <b>".$user."</b>";
		}
	}

	function login()
	{
		$username = $this->input->post('username');
		$psw = $this->input->post('password');
		$this->load->model('Model_utama');
		$hasil = $this->Model_utama->Data_Login($username,$psw);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama."|".$items->status;
				$tanda=$items->status;
			}
			$_SESSION['username_belajar']=$session_username;
			if($tanda=="user"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
			else if($tanda=="admin"){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}

	function gantipassword()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('main-web/ganti_password',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}

		function updatepassword() {
		$username=$this->input->post('username');
		$psw=$this->input->post('pwd');
		$psw_lama=$this->input->post('pwd_lama');
		$this->load->model('Model_utama');
		$hasil = $this->Model_utama->Data_Login($username,$psw_lama);
		if(count($hasil->result()) <= 0)
		{
			?>
			<script type="text/javascript">
				alert('Password lama yang anda masukkan SALAH..!!!');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/passwordsiswa'>";
		}
		else if($psw!="" AND $psw_lama!="")
		{
			$this->Model_utama->Update_Password($username,$psw);
			echo "<font size='2' face='arial'>Sukses memperbarui password.<br> Password anda yang baru : <b>".$psw."</b><br>
			Dengan username : <b>".$username."</b>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/gantipassword'>";
		}
	}

	function kontak(){
	$id_berita='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_berita='';
		}
		else
		{
    			$id_berita = $this->uri->segment(3);
		}
	$this->load->model('Model_utama');
	$data=array();
	$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
	$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
	$data["berita_populer"] = $this->Model_utama->Berita_Populer();
	$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();

	$this->load->view('main-web/bg_header',$data);
	$this->load->view('main-web/kontak',$data);
	$this->load->view('main-web/bg_footer',$data);
	}

	function simpankontak(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nama','Nama','required');
	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	$nama_non=$this->input->post('nama');
	$email_non=$this->input->post('email');
	$isi_non=$this->input->post('isi');
	$nama=strip_tags($nama_non);
	$email=strip_tags($email_non);
	$isi=strip_tags($isi_non);
	$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();

	if ($this->form_validation->run() == FALSE)
		{
			?>
			<script type="text/javascript">
			alert("Inputan tidak Valid!!! Ulangi lagi.");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."menu_utama/kontak/'>";
		}
		else
		{

			$datainput['nama']=$nama;
			$datainput['email']=$email;
			$datainput['isi']=$isi;
			$datainput['tanggal']=mdate($tgl,$time);;
			$this->load->model('Model_utama');
			echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>×</button>
                <strong>berhasil!</strong> anda sukses mengirim pesan.
            </div>";

	$data=array();
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
	$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
	$data["berita_populer"] = $this->Model_utama->Berita_Populer();
	$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();
	$data["kontak"] = $this->Model_utama->Kontak($datainput);

	$this->load->view('main-web/bg_header',$data);
	$this->load->view('main-web/kontak');
	$this->load->view('main-web/bg_footer',$data);
	}
	}
		function albumgaleri(){

    			$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
	$data=array();
	$this->load->model('Model_utama');
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();
		$data["tutorial_terbaru"] = $this->Model_utama->Tutorial_Terbaru();
		$data["album"] = $this->Model_utama->get_all_album($id);


		$this->load->view('main-web/bg_header',$data);
		$this->load->view('main-web/album_galeri',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_footer',$data);
}
	 function fotoalbum(){

	 $this->load->model('Model_utama');
	 $album_id = $this->uri->segment(3);
		$data=array();
		$data["kategori_berita"] = $this->Model_utama->Daftar_Kategori_Berita();
		$data["kategori_tutorial"] = $this->Model_utama->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Model_utama->Berita_Populer();
		$data["tutorial_populer"] = $this->Model_utama->Tutorial_Populer();
		$data['foto_album']=$this->Model_utama->foto_album($album_id);

		$this->load->view('main-web/bg_header',$data);
		$this->load->view('main-web/fotoalbum',$data);
		$this->load->view('main-web/bg_kanan',$data);
		$this->load->view('main-web/bg_footer',$data);
		}

	}
	?>
