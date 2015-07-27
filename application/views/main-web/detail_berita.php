
<section id="ccr-main-section">
	<div class="container">


		<section id="ccr-left-section" class="col-md-8">
			<div class="current-page">
			<?php
			foreach($detail->result_array() as $rows) {
			$nama_kategori=$rows['nama_kategori'];
			$isian=nl2br($rows['isi']);
$id_berita=$rows['id_berita'];
$judul_berita=$rows['judul_berita'];
$nama_kategori=$rows['nama_kategori'];
             echo   "
				<a href='".base_url()."'><i class='fa fa-home'></i> <i class='fa fa-angle-double-right'></i></a> News <i class='fa fa-angle-double-right'></i>".$nama_kategori."<i class='fa fa-angle-double-right'></i>Detail
</div>

			<article id='ccr-article'>
				<h1>".$rows['judul_berita']."</a></h1>

				<div class='article-like-comment-date'>	
					Posted by <a href='#author'>Admin</a> on <time datetime>".$rows['tanggal']."</time> in <a href='".base_url()."menu_utama/katberita/".$rows['id_kategori']."'>".$rows['nama_kategori']."</a>

					";
					foreach($jumlah_komentar->result() as $a) {
					echo"
					<a class='comments' href='#'><i class='fa fa-comments-o'></i>".$a->jml."</a>";}
					echo"
										
				</div> <!-- /.article-like-comment-date -->


				<img src='".base_url()."asset/menu_utama/berita/".$rows['gambar']."'>
				<p>
					".$isian."
				</p>
				<div class='article-tags'>
					Tag: <a href='#tag1'>".$rows['nama_kategori']."  |</a>
					Artikel ini dibaca sebanyak<b> ".$rows['counter']." </b> kali
				</div>

			</article>";}?> <!-- /#ccr-single-post -->

			<section id="ccr-latest-post-gallery">
					<div class="ccr-gallery-ttile">
						<span></span> 
						<p>Berita Terbaru</p>
					</div><!-- .ccr-gallery-ttile -->
					<ul class="ccr-latest-post">
					
<?php 
foreach ($berita_terbaru->result() as $new) 
{
$isi_berita = substr($new->isi,0,50);
echo"
					<li>
								<div class='ccr-thumbnail'>
									<img src='".base_url()."asset/menu_utama/berita/".$new->gambar."'height='200'></a>
									<p><a href='".base_url()."menu_utama/detailberita/".$new->id_berita."'>Read More</a></p>
								</div>
								<h4><a href='".base_url()."menu_utama/detailberita/".$new->id_berita."'>".$new->judul_berita."</a></h4>
							</li>";}?>
						</ul> <!-- /.ccr-latest-post -->
				

			</section><!-- /.col-md-8 / #ccr-left-section -->

			<section class="bottom-border"></section> <!-- /#bottom-border -->

			<section id="ccr-commnet">
			<?php
			$i=1;
			foreach($query->result() as $tampil)
			if( $tampil->status=='F'AND $i==1 ){
			echo"
				<div class='ccr-gallery-ttile'>
						<span class='bottom'></span>
						<p>Tidak ada komentar</p>
				</div>";$i++;
			}else if($tampil->status=='T'){
				
			?>
			<div class="ccr-gallery-ttile">
						<span class="bottom"></span>
						<p>Komentar</p>
				</div>
			<?php
echo"
				<ol class='commentlist'>
					<li  class='comment'>
						<article>
							<div class='comment-authore'>
								<img src='".base_url()."asset/menu_utama/img/user-avatar.jpg'>
								<a href='#'>".$tampil->nama."</a>
							</div>
							<div class='comment-content'>
								".$tampil->komentar."
							</div>
							<div class='comment-meta'> 08 February; 2014</div>
						</article>
								
							</li> <!-- /.comment -->
						</ul> <!-- /.children -->
					</li> <!-- /.comment -->
				</ol>";$i++;}?> <!-- /.commentlist -->



			</section> <!-- /#ccr-commnet -->



			<section class="bottom-border"></section> <!-- /#bottom-border -->

			<section id="ccr-respond">
				<div class="ccr-gallery-ttile">
						<span class="bottom"></span>
						<p>Post a Comment</p>
				</div> <!-- .ccr-gallery-ttile -->
				<div id="respond">
					<?php echo form_open('menu_utama/kirimkomentar'); ?>
					<input class="span4" id="prependedInput" size="16" type="hidden" name="id_berita" value="<?php echo $id_berita; ?>">
					<input class="span4" id="prependedInput" size="16" type="hidden" name="judul_berita" value="<?php echo $judul_berita; ?>">
					<input class="span4" id="prependedInput" size="16" type="hidden" name="nama_kategori" value="<?php echo $nama_kategori; ?>">
					<input id="author" name="nama" type="text" placeholder="Name" value="" required>
					<input id="email" name="email" type="email" placeholder="Email" value="" required>
					<textarea id="comment" name="komentar" placeholder="Message" rows="8" required></textarea>
					<input name="submit" type="submit" id="submit" value="Submit">
					
					</form> <!-- /#commentform -->
					
				</div> <!-- /#respond -->

			</section> <!-- /#ccr-respond -->


				


		</section><!-- /.col-md-8 / #ccr-left-section -->