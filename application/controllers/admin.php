<?php

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date','file'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/isi_index',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}

	function berita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=13;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Berita($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Berita();
      		$config['base_url'] = base_url() . '/admin/berita';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();

        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/berita',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function editberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Berita($id);
			$data['kategori']=$this->Admin_model->Kat_Berita();

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function updateberita()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$config['upload_path'] = 'asset/menu_utama/berita/';
			$config['allowed_types'] ='bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '270';
			$config['max_height'] = '200';
			$this->load->library('upload', $config);

			if(empty($_FILES['userfile']['name'])){
				$in["judul_berita"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi_tutorial');
				$in["id_berita"]=$this->input->post('id_tutorial');
				$in["id_kategori"]=$this->input->post('kategori');
				$this->Admin_model->Update_Berita($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/berita'>";

			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$in2["judul_berita"]=$this->input->post('judul');
				$in2["isi"]=$this->input->post('isi_tutorial');
				$in2["id_berita"]=$this->input->post('id_tutorial');
				$in2["gambar"]=$_FILES['userfile']['name'];
				$in2["id_kategori"]=$this->input->post('kategori');
				$this->Admin_model->Update_Berita($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/berita'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function tambahberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data['kategori']=$this->Admin_model->Kat_Berita();

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function simpanberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$in=array();
			if(empty($_FILES['userfile']['name'])){
			$in['judul_berita']=$this->input->post('judul');
			$in['id_kategori']=$this->input->post('kategori');
			$in['isi']=$this->input->post('isi');
			$in['gambar']="gbr-news.jpg";
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["counter"] = 0;
			$this->Admin_model->Simpan_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/berita'>";
			}
			else{
			$in['judul_berita']=$this->input->post('judul');
			$in['id_kategori']=$this->input->post('kategori');
			$in['isi']=$this->input->post('isi');
			$in['gambar']=$_FILES['userfile']['name'];
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["counter"] = 0;

			$config['upload_path'] = 'asset/menu_utama/berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '770';
			$config['max_height'] = '700';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
			 echo $this->upload->display_errors();
			}
			else {
			$this->Admin_model->Simpan_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/berita'>";
			}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function hapusberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/berita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function katberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$data['kategori']=$this->Admin_model->Kat_Berita();

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function tambahkatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function simpankatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Simpan_Kat_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function editkatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Kat_Berita($id);

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function updatekatberita()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['id_kategori']=$this->input->post('id_kat');
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Update_Kat_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function hapuskatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Kat_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function komenberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$id_ber = $this->uri->segment(3);
			$query=$this->Admin_model->Komen_Berita($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Komen_Berita();
      		$config['base_url'] = base_url() . '/admin/komenberita';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();

        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/komen_berita',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function detailkomenberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$id_ber = $this->uri->segment(3);
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$queryy=$this->Admin_model->detail_komen_berita($id_ber,$limit_ti,$offset_ti);
			$publish=$this->Admin_model->publish($id_ber);
			$tot_hal = $this->Admin_model->Total_Komen_Berita();
      		$config['base_url'] = base_url() . '/admin/komenberita';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();

        	$data_isi = array('queryy' => $queryy,$publish,'paginator'=>$paginator, 'page'=>$page);

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/detail_komen_berita',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}


	function hapuskomenberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Komen_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/komenberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function tutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
			if($data["status"]=="admin"){
		$this->load->model('Admin_model');
		$this->load->library('Pagination');
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Admin_model->Tampil_Tutorial($limit_ti,$offset_ti);
		$tot_hal = $this->Admin_model->Total_Tutorial();
      		$config['base_url'] = base_url() . '/admin/tutorial';
       		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tutorial',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function tambahtutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data['kategori']=$this->Admin_model->Kat_Tutorial();

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_tutorial',$data);
			$this->load->view('admin/bg_bawah');

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function simpantutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			if(empty($_FILES['userfile']['name'])){
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
			$in["author"]=$nim;
			$in["id_kategori_tutorial"]=$this->input->post('kategori');
			$in["counter"]=0;
			$in["gambar"]="gbr-tutor.jpg";
			$this->Admin_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tutorial'>";
			}
			else{
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
			$in["author"]=$nim;
			$in["id_kategori_tutorial"]=$this->input->post('kategori');
			$in["counter"]=0;
			$in["gambar"]=$_FILES['userfile']['name'];
			$config['upload_path'] = './system/application/views/main-web/tutorial/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
			 echo $this->upload->display_errors();
			}
			else {
			$this->Admin_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tutorial'>";
			}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function edittutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

			if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data["kategori"]=$this->Admin_model->Edit_Tutorial($id);
			$data["cur_kat"]=$this->Admin_model->Kat_Tutorial();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function updatetutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$config['upload_path'] = './system/application/views/main-web/tutorial/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';
			$this->load->library('upload', $config);

			if(empty($_FILES['userfile']['name'])){
				$in["judul_tutorial"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi_tutorial');
				$in["id_tutorial"]=$this->input->post('id_tutorial');
				$in["author"]=$nim;
				$in["id_kategori_tutorial"]=$this->input->post('kategori');
				$this->Admin_model->Update_Tutorial($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tutorial'>";

			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$in2["judul_tutorial"]=$this->input->post('judul');
				$in2["isi"]=$this->input->post('isi_tutorial');
				$in2["id_tutorial"]=$this->input->post('id_tutorial');
				$in2["author"]=$nim;
				$in2["gambar"]=$_FILES['userfile']['name'];
				$in2["id_kategori_tutorial"]=$this->input->post('kategori');
				$this->Admin_model->Update_Tutorial($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tutorial'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function hapustutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="admin"){
			$this->load->model('Admin_model');
			$this->Admin_model->Delete_Tutorial($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}

	function kattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];

		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$data['kategori']=$this->Admin_model->Tampil_Kat_Tutorial($limit_ti,$offset_ti);

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>

			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function tambahkattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function simpankattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Simpan_Kat_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function editkattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Kat_Tutorial($id);

			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function updatekattutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['id_kategori_tutorial']=$this->input->post('id_kat');
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Update_Kat_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function hapuskattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Kat_Tutorial($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
	function album(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){

	    $this->load->model('admin_model');
		$data=array(
            'title'=>'Album',
        );
		$id=$this->uri->segment(3);
		$data['album']=$this->admin_model->get_all_album();
		$data['foto_album']=$this->admin_model->foto_album($id);
		$this->load->view('admin/bg_head',$data);
		$this->load->view('admin/album',$data);
		$this->load->view('admin/bg_bawah');
		}else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
	function buat_banner(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$this->load->view('admin/bg_head',$data);
		$this->load->view('admin/tambah_banner',$data);
		$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
	function lihatbanner(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$this->load->model('admin_model');
		$data['banner']=$this->admin_model->banner();
		$this->load->view('admin/bg_head');
		$this->load->view('admin/lihatbanner',$data);
		$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

	}

	function simpanbanner(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){

	$this->load->library('upload');
	$this->load->library('form_validation');
	$this->load->model('admin_model');
		$config['upload_path'] = './asset/menu_utama/banner/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '3000';
		$config['max_width']  	= '3000';
		$config['max_height']  	= '3000';

		$this->upload->initialize($config);
		$this->upload->do_upload('banner');
		$data = $this->upload->data();
		$url_foto = $data['file_name'] ;
		$tgl = " %Y-%m-%d";
		$jam = "%H:%i:%s";
		$time = time();

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			if ($this->form_validation->run() == FALSE)
				{
					$data=array('title'=>'Buat Album Gagal..!',);
					$error = array('error' => $this->upload->display_errors());
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatbanner'>";
				}
			else
				{
					$data_album = array(
					'nama' 			=>$this->input->post('nama'),
					'foto'   			=>$url_foto,
					'tanggal' =>mdate ($tgl,$time),
					'waktu' =>mdate ($jam,$time),);
					$this->admin_model->simpan_banner($data_album);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatbanner'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

		}
	function lihatalbum(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$this->load->model('admin_model');
		$album_id = $this->uri->segment(3);
		$data['album']=$this->admin_model->get_all_album($album_id);
		$this->load->view('admin/bg_head');
		$this->load->view('admin/lihatalbum',$data);
		$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

	}
	function buat_album(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
	$this->load->view('admin/bg_head');
	$this->load->view('admin/form_buat_album');
	$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

}

	function upload_album(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){

	$this->load->library('upload');
	$this->load->library('form_validation');
	$this->load->model('admin_model');
		$config['upload_path'] = './asset/menu_utama/album/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '3000';
		$config['max_width']  	= '3000';
		$config['max_height']  	= '3000';

		$this->upload->initialize($config);
		$this->upload->do_upload('caver');
		$data = $this->upload->data();
		$url_foto = $data['file_name'] ;

		$this->form_validation->set_rules('nama_album', 'Nama Album', 'trim|required');
			if ($this->form_validation->run() == FALSE)
				{
					$data=array('title'=>'Buat Album Gagal..!',);
					$error = array('error' => $this->upload->display_errors());
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatalbum'>";
				}
			else
				{
					$data_album = array(
					'nama_album' 			=>$this->input->post('nama_album'),
					'caver_album'   			=>$url_foto,);
					$this->admin_model->insert_data_album($data_album);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatalbum'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
	function hapusalbum(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$this->load->model('Admin_model');
		$id = $this->uri->segment(3);
			$this->Admin_model->Hapus_Album($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatalbum'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
			}
	function buat_foto(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
	$this->load->model('Admin_model');
	$data['album']=$this->Admin_model->get_all_album();
	$this->load->view('admin/bg_head');
	$this->load->view('admin/form_buat_foto',$data);
	$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

}

	function upload_album_perjudul()
	{
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){

	$this->load->library('upload');
	$this->load->library('form_validation');
	$this->load->model('admin_model');
	$data=array('title'=>'Gagal Upload Foto!');

	$config['upload_path'] = './asset/menu_utama/album/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size']     = '3000';
	$config['max_width']  	= '3000';
	$config['max_height']  	= '3000';

	$this->upload->initialize($config);
	$this->upload->do_upload('foto');
	$data	 	= $this->upload->data();
	$url_foto   = $data['file_name'] ;

	$this->load->library('image_lib');
	$img['image_library'] = 'gd2';
	$img['thumb_marker'] = '';
	$img['quality']      = '100%' ;
	$img['source_image'] = $url_foto;
	$img['create_thumb'] = TRUE;
	$img['maintain_ratio'] = TRUE;
	$img['width'] = 500;
	$img['height'] = 350;
	$img['new_image']    = './asset/menu_utama/album/thumb/' ;
	$url_thumb             = $data['file_name'] ;
	$this->image_lib->initialize($img);
	$this->image_lib->resize();

	$data_album_perjudul = array(
		'album_id' 			=>$this->input->post('album'),
		'foto_thumb'   			=>$url_thumb,
		'foto'   			=>$url_foto,);
	$this->admin_model->insert_data_album_perjudul($data_album_perjudul);
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatalbum'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}

	function hapusfoto(){
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$this->load->model('Admin_model');
		$id = $this->uri->segment(3);
		$this->Admin_model->Hapus_Foto($id);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatalbum'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}

			}

	function hapusbanner($url_foto)
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="admin"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$url_foto= $this->simpanbanner();
			unlink(base_url().'asset/menu_utama/banner'.$url_foto);
			$this->Admin_model->Hapus_Banner($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/lihatbanner'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
	}
}

?>
