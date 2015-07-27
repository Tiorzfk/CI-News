<div id="bg-isi"><h2>Module Komentar Berita</h2><br />
<a href="<?php echo base_url(); ?>admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="680" bgcolor="#A6EC29" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#ADF72A" align="center"><td width="10"><strong>No.</strong></td><td width="500"><strong>Judul Berita</strong></td><td><strong>Kategori</strong></td><td><strong>Jumlah Komentar</strong></td><td width="5"><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
foreach($query->result() as $b){
		if(($nomor%2)==0){
			$warna="#fff";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='$warna' valign='top'><td>".$nomor."</td><td align='center'><a href='".base_url()."admin/detailkomenberita/".$b->id_berita."'>".$b->judul_berita."</a></td><td>".$b->nama_kategori."</td><td><center>".$b->jml."</center></td><td><a href='".base_url()."admin/hapuskomenberita/".$b->id_komen_berita."' onClick=\"return confirm('Anda yakin ingin menghapus komentar ini?')\" title='Hapus'><img src='".base_url()."asset/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
$nomor++;
}
?>
</table>
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>