<div id="bg-isi"><h2>Module Lihat Album</h2><br />
<a href="<?php echo base_url(); ?>admin/buat_album"><div class="pagingpage"><b> + Buat album </b></div></a>
<a href="<?php echo base_url(); ?>admin/buat_foto"><div class="pagingpage"><b> + Foto </b></div></a>
<br /><br />
<table width="870" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td width="30"><strong>No.</strong></td><td><strong>Nama Album</strong></td><td><strong>Album</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php

foreach($album->result_array() as $b)
{
		
echo "<tr ><td>".$b['id_album']."</td><td><a href='".base_url()."admin/album/".$b['album_id']."'>".$b['nama_album']."</td><td><center><img src='".base_url()."asset/menu_utama/album/".$b['caver_album']."' border='0' width=200></center></td>
<td><a href='".base_url()."admin/hapusalbum/".$b['id_album']."' onClick=\"return confirm('Anda yakin ingin menghapus album ini?')\" title='Hapus'><img src='".base_url()."asset/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
}
?>
</table>
</td></tr><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>