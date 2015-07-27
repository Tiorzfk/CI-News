<div id="bg-isi"><h2>Module Komentar Berita</h2><br />
<a href="<?php echo base_url(); ?>admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="630" bgcolor="#A6EC29" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#ADF72A" align="center"><td width="10"><strong>No.</strong></td><td width="500"><strong>Komentar</strong></td><td><strong>Nama</strong></td><td><strong>Email</strong></td><td width="5"><strong>Status</strong></td><td width="5"><strong>Publish</strong></td><td width="5"><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
foreach($queryy->result() as $b)
{
		if(($nomor%2)==0){
			$warna="#fff";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='$warna' valign='top'><td>".$nomor."</td><td align='center'>".$b->komentar."</td><td align='center'>".$b->nama."</td><td align='center'>".$b->email."</td>";if($b->status=='F'){echo"<td width='250'>Belum di Publish</td>";}else if($b->status='T'){echo"<td>Ter-Publish</td>";} echo "<td>";if($b->status=='F'){echo"<a href='".base_url()."admin/detailkomenberita/".$b->id_detailkomentarberita."'>Publish";}else if($b->status='T'){echo"";}echo"</td><td><a href='".base_url()."admin/hapuskomenberita/".$b->id_detailkomentarberita."' onClick=\"return confirm('Anda yakin ingin menghapus komentar ini?')\" title='Hapus'><img src='".base_url()."asset/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
$nomor++;
}
?>
</table>
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>