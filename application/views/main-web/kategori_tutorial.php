
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
					$isi_tutorial = substr($row->isi,0,250);
					echo"
<section id='ccr-blog'>

				<article>
					<figure class='blog-thumbnails'>
					<img src='".base_url()."asset/menu_utama/tutorial/".$row->gambar."'>
					</figure> <!-- /.blog-thumbnails -->
					<div class='blog-text'>
						<h1><a href='".base_url()."menu_utama/detailtutorial/".$row->id_tutorial."'>".$row->judul_tutorial."</a></h1>
						<p>
							".$isi_tutorial."....
						</p>


						<div class='meta-data'>			
							<a href='#' class='like'><i class='fa fa-thumbs-o-up'></i> 08</a>
							<a href='#' class='comments'><i class='fa fa-comments-o'></i> 49</a>			
							<span class='read-more'><a href='".base_url()."menu_utama/detailtutorial/".$row->id_tutorial."'>Read More</a></span>
						</div>
					</div> <!-- /.blog-text -->
					
				</article>
</section> <!-- /#ccr-blog -->";}?>
				<div class="clearfix"></div>
				<nav class="nav-paging">
					<ul>
						<li><a href="#pre"><i class="fa fa-chevron-left"></i></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><span class="current">3</span></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#next"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</nav>
</section><!-- /.col-md-8 / #ccr-left-section -->