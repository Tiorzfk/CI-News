<div id="bg-isi"><h2>Module Lihat Album</h2><br />
<a href="<?php echo base_url(); ?>admin/buat_banner"><div class="pagingpage"><b> + Buat banner </b></div></a>
<br /><br />
<table width="870" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td width="100"><strong>Tanggal</strong></td><td><strong>Nama Banner</strong></td><td><strong>Banner</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
foreach($banner->result_array() as $b)
{
		
echo "<tr ><td><center>".$b['tanggal']."</center></td><td><center>".$b['nama']."</center></td><td><center><img src='".base_url()."asset/menu_utama/banner/".$b['foto']."' border='0' width=200></center></td>
<td><a href='".base_url()."admin/hapusbanner/".$b['id']."' onClick=\"return confirm('Anda yakin ingin menghapus album ini?')\" title='Hapus'><img src='".base_url()."asset/admin/images/hapus-icon.gif' border='0'></center></a></td></tr>";
}
?>
</table>
</td></tr><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>