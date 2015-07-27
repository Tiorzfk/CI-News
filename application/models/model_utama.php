<?php
class Model_utama extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
	
			function Kategori_Berita($id_kategori,$limit,$ofset)
		{
			$query_kat_berita=$this->db->query("SELECT tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, 
			tblberita.waktu, tblberita.tanggal,tblberita.id_kategori, tblkategori.nama_kategori from tblberita left outer join tblkategori on 
			tblberita.id_kategori=tblkategori.id_kategori where tblberita.id_kategori='$id_kategori' order by id_berita DESC LIMIT $ofset,$limit");
			return $query_kat_berita;
		}
		function foto_album($album_id)
	{
	$query=$this->db->query("select foto_album.id_foto, foto_album.foto, foto_album.album_id from foto_album left join album on 
	foto_album.album_id = album.id_album where foto_album.album_id='$album_id' order by id_foto");
	return $query;
	}
				function get_all_album()
	{
			$queryy=$this->db->query("SELECT foto_album.id_foto, foto_album.album_id, album.caver_album, album.nama_album from album left outer join foto_album on 
	album.id_album =foto_album.album_id  where album.id_album group by foto_album.album_id");
	return $queryy;
	}
				function Detail_Berita($id_berita)
		{
			$query_detail_berita=$this->db->query("SELECT tblberita.counter, tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, tblberita.waktu, tblberita.tanggal, tblkategori.id_kategori,
			tblkategori.nama_kategori from tblberita left outer join tblkategori on tblberita.id_kategori=tblkategori.id_kategori where id_berita='$id_berita'");
			return $query_detail_berita;
		}
		function Jumlah_Komentar($id_berita)
		{
			$t=$this->db->query("select count(tblkomentarberita.id_komen_berita) as jml from tblkomentarberita where tblkomentarberita.id_berita='$id_berita'");
			return $t;
		}
		function Berita_Acak($id_berita)
		{
			$query_berita=$this->db->query("SELECT * from tblberita where id_berita!='$id_berita' order by RAND() LIMIT 8");
			return $query_berita;
		}
		function Tutorial_Acak($id_tutorial)
		{
			$query_tutorial=$this->db->query("SELECT * from tbltutorial where id_tutorial!='$id_tutorial' order by RAND() LIMIT 5");
			return $query_tutorial;
		}
				function Detail_Tutorial($id_tutorial)
		{
			$query_detail_tutorial=$this->db->query("SELECT tbltutorial.author, tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori, tblkategoritutorial.id_kategori_tutorial, tbltutorial.counter from tbltutorial left outer join
			tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where id_tutorial='$id_tutorial'");
			return $query_detail_tutorial;
		}
			function Total_Komentar_Berita($id_berita)
		{
			$query_detail_berita=$this->db->query("SELECT tblberita.judul_berita, tblkomentarberita.id_komen_berita, tblkomentarberita.nama, tblkomentarberita.email, tblkomentarberita.komentar, tblkomentarberita.tanggal, tblkomentarberita.waktu from tblberita left outer join tblkomentarberita on 					tblberita.id_berita=tblkomentarberita.id_berita where tblberita.id_berita='$id_berita'");
			return $query_detail_berita;
		}
				function Simpan_Data($datainput,$datainput2)
		{
			$this->db->insert('tblkomentarberita',$datainput);
			$this->db->insert('tbldetail_komentarberita',$datainput2);
		}
		function Simpan_Daftarlogin($datainput)
		{
			$this->db->insert('tbllogin',$datainput);
		}		
		function Tampil_Komentar_Berita($id_berita)
		{
			$query_tampil=$this->db->query("SELECT tblberita.judul_berita, tbldetail_komentarberita.nama, tbldetail_komentarberita.id_detailkomentarberita, tbldetail_komentarberita.email, tbldetail_komentarberita.komentar, tbldetail_komentarberita.tanggal, tbldetail_komentarberita.status, tbldetail_komentarberita.waktu from tblberita left outer join tbldetail_komentarberita on tblberita.id_berita=tbldetail_komentarberita.id_berita where tblberita.id_berita='$id_berita' order by id_detailkomentarberita");
			return $query_tampil;
		}
					function Update_Counter_Berita($id_berita)
		{
			$query_update=$this->db->query("update tblberita set counter=counter+1 where id_berita='$id_berita'");
			return $query_update;
		}
				function Update_Counter_Tutorial($id_tutorial)
		{
			$query_update=$this->db->query("update tbltutorial set counter=counter+1 where id_tutorial='$id_tutorial'");
			return $query_update;
		}
				function Berita_Populer()
		{
			$query_populer=$this->db->query("select tblberita.id_berita, tblberita.judul_berita, tblberita.counter, tblberita.tanggal, tblberita.gambar from tblberita 
			order by counter
			DESC limit 4");
			return $query_populer;
		}
		
				function Berita_Terbaru()
		{
			$query_populer=$this->db->query("select tblberita.id_berita, tblberita.judul_berita, tblberita.tanggal, tblberita.gambar, tblberita.isi from tblberita 
			order by tanggal
			DESC limit 6");
			return $query_populer;
		}
		
		function Tutorial_Populer()
		{
			$query_populer=$this->db->query("select tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.counter, tbltutorial.tanggal, tbltutorial.gambar from 
			tbltutorial order by counter DESC limit 4");
			return $query_populer;
		}
		
		function Tutorial_Terbaru()
		{
			$query_populer=$this->db->query("select tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.tanggal, tbltutorial.gambar from 
			tbltutorial order by tanggal DESC limit 3");
			return $query_populer;
		}
		

		function Total_Berita($id_kategori)
		{
			$query_kat_berita=$this->db->query("SELECT * from tblberita left outer join tblkategori on 
			tblberita.id_kategori=tblkategori.id_kategori where tblberita.id_kategori='$id_kategori' order by id_berita");
			return $query_kat_berita;
		}
				function Slide_Berita()
		{
			$query_berita=$this->db->query("SELECT tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, tblberita.waktu, tblberita.tanggal, 
			tblkategori.nama_kategori from tblberita left outer join tblkategori on tblberita.id_kategori=tblkategori.id_kategori order by tanggal DESC LIMIT 10");
			return $query_berita;
		}
				function Tampil_Tutorial()
		{
			$query_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial order by id_tutorial DESC LIMIT 4");
			return $query_tutorial;

		}
		function Daftar_Kategori_Berita()
		{
			$query_kategori=$this->db->query("select * from tblkategori");
			return $query_kategori;
		}
				function Daftar_Kategori_Tutorial()
		{
			$query_kategori_tutorial=$this->db->query("select * from tblkategoritutorial");
			return $query_kategori_tutorial;
		}
			function Judul_Kategori_Berita($id_kategori)
		{
			$query_kategori=$this->db->query("select * from tblkategori where id_kategori='$id_kategori'");
			return $query_kategori;
		}
		
				function Kategori_Tutorial($id_kategori)
		{
			$query_kat_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, 
			tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where tbltutorial.id_kategori_tutorial='$id_kategori' order by id_tutorial DESC LIMIT 5");
			return $query_kat_tutorial;
		}
		function Total_Tutorial($id_kategori)
		{
			$query_kat_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, 
			tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where tbltutorial.id_kategori_tutorial='$id_kategori' order by id_tutorial DESC");
			return $query_kat_tutorial;
		}
		function Judul_Kategori_Tutorial($id_kategori)
		{
			$query_kategori=$this->db->query("select * from tblkategoritutorial where id_kategori_tutorial='$id_kategori'");
			return $query_kategori;
		}
		function Update_Password($nim,$pwd)
		{
			$this->db->query("update tbllogin set psw='$pwd' where username='$nim'");
		}
		function Data_Login($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from tbllogin where username='$user_bersih' and psw=('$pass_bersih')");
			return $query;
		}
		function kontak($datainput)
		{
			$this->db->insert('tblkontak',$datainput);
		}
		function Itembanner()
		{
			$kat=$this->db->query("select * from tblbanner order by tanggal DESC");
			return $kat;
		}

		}
		?>