
<section id="ccr-main-section">
	<div class="container">


		<section id="ccr-left-section" class="col-md-8">
			<div class="current-page">
			<?php
			foreach($detail->result_array() as $rows) {
			$nama_kategori=$rows['nama_kategori'];
			$isian=nl2br($rows['isi']);
$id_tutorial=$rows['id_tutorial'];
             echo   "
				<a href='".base_url()."'><i class='fa fa-home'></i> <i class='fa fa-angle-double-right'></i></a> News <i class='fa fa-angle-double-right'></i>".$nama_kategori."<i class='fa fa-angle-double-right'></i>Detail
</div>

			<article id='ccr-article'>
				<h1>".$rows['judul_tutorial']."</a></h1>

				<div class='article-like-comment-date'>	
					Posted by <a href='#author'>Admin</a> on <time datetime>".$rows['tanggal']."</time> in <a href='".base_url()."menu_utama/kattutorial/".$rows['id_kategori_tutorial']."'>".$rows['nama_kategori']."</a>

					<a class='like' href='#'><i class='fa fa-thumbs-o-up'></i> 08</a>
					<a class='comments' href='#'><i class='fa fa-comments-o'></i> 49</a>
										
				</div> <!-- /.article-like-comment-date -->


				<img src='".base_url()."asset/menu_utama/tutorial/".$rows['gambar']."'>
				<p>
					".$isian."
				</p>
				<div class='article-tags'>
					Tag: <a href='#tag1'>".$rows['nama_kategori']."  |</a>
					Artikel ini dibaca sebanyak<b> ".$rows['counter']." </b> kali
				</div>

			</article>";}?> <!-- /#ccr-single-post -->
			<section id="ccr-article-related-post">
			<div class="ccr-gallery-ttile">
						<span class="bottom"></span>
						<p>Related Post</p>
				</div> <!-- .ccr-gallery-ttile -->
				<ul>
			
<?php
foreach($acak_tutorial->result_array() as $acak)
{
$isi_tutorial = substr($acak['isi'],0,40);
echo"
						<li>
							
							<div class='ccr-thumbnail'>
								<img src='".base_url()."asset/menu_utama/tutorial/".$acak['gambar']."'>
								<p><a href='".base_url()."menu_utama/detailtutorial/".$acak['id_tutorial']."'>Read More</a></p>
							</div>
							<h5><a href='".base_url()."menu_utama/detailtutorial/".$acak['id_tutorial']."'>".$isi_tutorial."</a></h5>
						</li>
							
			
					";}?></ul>


			</section> <!-- /#ccr-article-related-post -->
		</section><!-- /.col-md-8 / #ccr-left-section -->