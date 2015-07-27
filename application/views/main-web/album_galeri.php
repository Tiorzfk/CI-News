
<section id="ccr-main-section">
	<div class="container">
		<section id="ccr-left-section" class="col-md-8">

			<div class="current-page">
				<a href="<?php echo base_url();?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a>
			</div> <!-- / .current-page -->

			<section id="ccr-blog-s2">
			<?php

foreach($album->result_array() as $b)
{
echo"
				<ul>
					<li>
						<article>
							<figure class='blog-thumbnails'>
							<img src='".base_url()."asset/menu_utama/album/".$b['caver_album']."' border='0' width=200>
							</figure> <!-- /.blog-thumbnails -->
							<div class='blog-text'>
								<h4><a href='".base_url()."menu_utama/fotoalbum/".$b['album_id']."'>".$b['nama_album']."</a></h4>
							</div> <!-- /.blog-text -->
						</article>
						</li>";}?>
					</section>
					</section>