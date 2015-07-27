<?php
class Admin_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function Tampil_Berita($limit,$ofset)
		{
			$t=$this->db->query("select * from tblberita left join tblkategori 
			on tblberita.id_kategori=tblkategori.id_kategori order by id_berita DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Komen_Berita($limit,$ofset)
		{
			$t=$this->db->query("select count(tblkomentarberita.id_komen_berita) as jml, tblkomentarberita.id_komen_berita, tblkomentarberita.id_berita,tblkomentarberita.nama_kategori, tblkomentarberita.judul_berita from tblkomentarberita left outer join tbldetail_komentarberita
			on tblkomentarberita.id_komen_berita=tbldetail_komentarberita.id_detailkomentarberita where tblkomentarberita.id_komen_berita  group by tblkomentarberita.id_berita DESC LIMIT $ofset,$limit");
			return $t;
		}
	
		function Detail_Komen_Berita($id_ber,$limit,$ofset)
		{
			$t=$this->db->query("select count(tbldetail_komentarberita.id_detailkomentarberita) as jmlo, tbldetail_komentarberita.id_detailkomentarberita, tbldetail_komentarberita.nama, tbldetail_komentarberita.status, tbldetail_komentarberita.email, tbldetail_komentarberita.id_berita, tbldetail_komentarberita.komentar,tbldetail_komentarberita.id_detailkomentarberita,tblkomentarberita.id_komen_berita
			from tbldetail_komentarberita left join tblkomentarberita on tbldetail_komentarberita.id_detailkomentarberita=tblkomentarberita.id_komen_berita 
			where tbldetail_komentarberita.id_berita='$id_ber' order by id_detailkomentarberita ");
			return $t;
		}
		function publish($id_ber){
		$t=$this->db->query("UPDATE tbldetail_komentarberita SET
				status='T'
				WHERE id_detailkomentarberita='$id_ber'");
		}
		function Total_Berita()
		{
			$t=$this->db->query("select * from tblberita");
			return $t;
		}
		function Edit_Berita($id)
		{
			$t=$this->db->query("select * from tblberita left join tblkategori on tblberita.id_kategori=tblkategori.id_kategori where id_berita='$id'");
			return $t;
		}
		function Kat_Berita()
		{
			$kat=$this->db->query("select * from tblkategori order by id_kategori DESC");
			return $kat;
		}
		function Update_Berita($in)
		{
			$this->db->where('id_berita',$in['id_berita']);
			$this->db->update('tblberita',$in);
		}
		function Simpan_Berita($in)
		{
			$kat=$this->db->insert('tblberita',$in);
			return $kat;
		}
		function Simpan_Banner($in)
		{
			$kat=$this->db->insert('tblbanner',$in);
			return $kat;
		}
		function Banner()
		{
			$kat=$this->db->query("select * from tblbanner order by tanggal DESC");
			return $kat;
		}
		function Hapus_Berita($id)
		{
			$this->db->where('id_berita',$id);
			$this->db->delete('tblberita');
		}
		function Hapus_Album($id)
		{
			$this->db->where('id_album',$id);
			$this->db->delete('album');
		}
		function Hapus_Banner($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('tblbanner');
		}
		function Hapus_Foto($id)
		{
			$this->db->where('id_foto',$id);
			$this->db->delete('foto_album');
		}
		function Simpan_Kat_Berita($in)
		{
			$kat=$this->db->insert('tblkategori',$in);
			return $kat;
		}
		function Edit_Kat_Berita($id)
		{
			$t=$this->db->query("select * from tblkategori where id_kategori='$id'");
			return $t;
		}
		function Update_Kat_Berita($in)
		{
			$this->db->where('id_kategori',$in['id_kategori']);
			$this->db->update('tblkategori',$in);
		}
		function Hapus_Kat_Berita($id)
		{
			$this->db->where('id_kategori',$id);
			$this->db->delete('tblkategori');
		}
						
		function Total_Komen_Berita()
		{
			$t=$this->db->query("select * from tblkomentarberita");
			return $t;
		}
		function Hapus_Komen_Berita($id)
		{
			$this->db->where('id_detailkomentarberita',$id);
			$this->db->delete('tbldetail_komentarberita');
			$this->db->where('id_komen_berita',$id);
			$this->db->delete('tblkomentarberita');
		}

		function Tampil_Tutorial($limit,$ofset)
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial order by id_tutorial DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Tutorial()
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial");
			return $t;
		}
		function Kat_Tutorial()
		{
			$kat=$this->db->query("select * from tblkategoritutorial");
			return $kat;
		}
		function Simpan_Tutorial($in)
		{
			$kat=$this->db->insert('tbltutorial',$in);
			return $kat;
		}
		function Edit_Tutorial($id)
		{
			$ed=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where 				id_tutorial='$id'");
			return $ed;
		}
		function Update_Tutorial($in)
		{
			$this->db->where('id_tutorial',$in['id_tutorial']);
			$this->db->update('tbltutorial',$in);
		}
		function Delete_Tutorial($id)
		{
			$this->db->where('id_tutorial',$id);
			$this->db->delete('tbltutorial');
		}
		function Tampil_Kat_Tutorial($limit,$ofset)
		{
			$t=$this->db->query("select * from tblkategoritutorial order by id_kategori_tutorial DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Simpan_Kat_Tutorial($in)
		{
			$kat=$this->db->insert('tblkategoritutorial',$in);
			return $kat;
		}
		function Edit_Kat_Tutorial($id)
		{
			$t=$this->db->query("select * from tblkategoritutorial where id_kategori_tutorial='$id'");
			return $t;
		}
		function Update_Kat_Tutorial($in)
		{
			$this->db->where('id_kategori_tutorial',$in['id_kategori_tutorial']);
			$this->db->update('tblkategoritutorial',$in);
		}
		function Hapus_Kat_Tutorial($id)
		{
			$this->db->where('id_kategori_tutorial',$id);
			$this->db->delete('tblkategoritutorial');
		}
	function get_all_album()
	{
		$queryy=$this->db->query("SELECT foto_album.id_foto, foto_album.album_id, album.id_album, album.caver_album, album.nama_album from album left outer join foto_album on 
	album.id_album =foto_album.album_id  where album.id_album group by foto_album.album_id");
	return $queryy;
	}
	function get_album_by_id($id)
	{
		$this->db->where('id_album',$id);
		return $this->db->get('album');
	}	
		
        function foto_album($album_id)
	{
	$query=$this->db->query("select foto_album.id_foto, foto_album.foto, foto_album.album_id from foto_album left join album on 
	foto_album.album_id = album.id_album where foto_album.album_id='$album_id' order by id_foto");
	return $query;
	}
	function insert_data_album($data)
	{
		$this->db->insert('album',$data);
	}
	function insert_data_album_perjudul($data)
	{
		$this->db->insert('foto_album',$data);
	
			
	}
        }