<div id="bg-isi"><h2>Module Foto</h2><br />
<a href="<?php echo base_url(); ?>admin/lihatalbum"><div class="pagingpage"><b> + album </b></div></a>
<a href="<?php echo base_url(); ?>admin/buat_foto"><div class="pagingpage"><b> + Foto </b></div></a>
<br /><br />
<table width="870" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td width="30"><strong>No.</strong></td><td><strong>Foto</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
foreach($foto_album->result_array() as $b)
{
echo "<tr><td>".$b['id_foto']."</td><td><center><img src='".base_url()."asset/menu_utama/album/".$b['foto']."' border='0' width=200></center></td>
<td><a href='".base_url()."admin/hapusfoto/".$b['id_foto']."' onClick=\"return confirm('Anda yakin ingin menghapus berita ini?')\" title='Hapus'><img src='".base_url()."asset/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
}
?>
</table>
</td></tr><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>