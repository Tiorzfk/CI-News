<section id="ccr-main-section">
	<div class="container">


		<section id="ccr-left-section" class="col-md-8">

			<div class="current-page">
			<?php
			foreach ($judul_kategori->result_array() as $row) {
$nama_kategori=$row['nama_kategori'];

echo "
<a href='".base_url()."'><i class='fa fa-home'></i> <i class='fa fa-angle-double-right'></i></a> News <i class='fa fa-angle-double-right'></i>".$nama_kategori."
</div>";}?>
<?php
foreach ($query->result() as $row)
					{
					$isi_berita = substr($row->isi,0,400);
					$id_berita=$row->id_berita;
					echo"
<section id='ccr-blog'>

				<article>
					<figure class='blog-thumbnails'>
					<a href='".base_url()."menu_utama/detailberita/".$id_berita."'><img src='".base_url()."asset/menu_utama/berita/".$row->gambar."'>
					</figure> <!-- /.blog-thumbnails -->
					<div class='blog-text'>
						<h1><a href='".base_url()."menu_utama/detailberita/".$row->id_berita."'>".$row->judul_berita."</a></h1>
						<p>
							".$isi_berita."....
						</p>
						<div class='meta-data'>

							<span class='read-more'><a href='".base_url()."menu_utama/detailberita/".$row->id_berita."'>Read More</a></span>
						</div>
					</div> <!-- /.blog-text -->

				</article>
</section>";
}
?> <!-- /#ccr-blog -->
				<div class="clearfix"></div>
					<?=$paginator;?>

</section><!-- /.col-md-8 / #ccr-left-section -->
