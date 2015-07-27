<div id="bg-isi"><h2>Module tambah foto</h2><br />
<br /><br />
<table width="870" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/upload_album_perjudul');?>
<tr><td width="150" valign="top">Foto</td><td width="10" valign="top">:</td><td><input type="file" name="foto"></td></tr>
<tr><td width="150">Pilih Album</td><td width="10">:</td><td>
<select name="album" class="textfield-option">
<?php
foreach($album->result_array() as $k)
{
echo "<option value='".$k["id_album"]."'>".$k["nama_album"]."</option>";
}
?>
</select>
</td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan" class="tombol"></td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>

