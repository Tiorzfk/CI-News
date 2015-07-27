
<section id="ccr-main-section">
	<div class="container">


		<section id="ccr-left-section" class="col-md-8">

			

			<div class="ccr-last-update">
				<div class="update-ribon"></div> <!-- /.update-ribon -->
				<span class="update-ribon-right"></span> <!-- /.update-ribon-left -->
				<div class="update-news-text" id="update-news-text">
						<ul id="latestUpdate">  
						    <li><a href="#"></a></li>
			
						</ul>
				</div> <!-- /.update-text -->

				<div class="update-right-border"></div> <!-- /.update-right-border -->
			</div> <!-- / .ccr-last-update -->


			<section id="ccr-slide-main" class="carousel slide" data-ride="carousel">				
					
					<!-- Carousel items -->
					<div class="carousel-inner">
						
						<?php
						$i=1;
foreach($itembanner->result_array() as $b)
{ ?>
		<div class='<?php if($i==1){echo"active";}?> item'>
<?php 		
echo"
						<div class='container slide-element'>
								<img src='".base_url()."asset/menu_utama/banner/".$b['foto']."' border='0' width=200>
								<p><a href='#'>".$b['nama']."</a></p>
							</div> <!-- /.slide-element -->
						</div>";$i++;}?> <!--/.active /.item -->
					</div> <!-- /.carousel-inner -->
					
					<!-- slider nav -->
					<a class="carousel-control left" href="#ccr-slide-main" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
					<a class="carousel-control right" href="#ccr-slide-main" data-slide="next"><i class="fa fa-arrow-right"></i></a>

					<ol class="carousel-indicators">
						<li data-target="#ccr-slide-main" data-slide-to="0" class="active"></li>
						<li data-target="#ccr-slide-main" data-slide-to="1"></li>
						<li data-target="#ccr-slide-main" data-slide-to="2"></li>
						<li data-target="#ccr-slide-main" data-slide-to="3"></li>
					</ol> <!-- /.carousel-indicators -->

							
			</section><!-- /#ccr-slide-main -->




			<section id="ccr-latest-post-gallery">
					<div class="ccr-gallery-ttile">
						<span></span> 
						<p>Berita Terbaru</p>
					</div><!-- .ccr-gallery-ttile -->
				<ul class="ccr-latest-post">
					
<?php 
foreach ($berita_terbaru->result() as $new) 
{
$isi_berita = substr($new->isi,0,20);
echo"
					<li>
								<div class='ccr-thumbnail'>
									<img src='".base_url()."asset/menu_utama/berita/".$new->gambar."'height='200'></a>
									<p><a href='".base_url()."menu_utama/detailberita/".$new->id_berita."'>Read More</a></p>
								</div>
								<h4><a href='".base_url()."menu_utama/detailberita/".$new->id_berita."'>".$new->judul_berita."</a></h4>
							</li>";}?>
							</ul>
						 <!-- /.ccr-latest-post -->
					
				</section> <!--  /#ccr-latest-post-gallery  -->
				
				<section class="bottom-border">
				</section> <!-- /#bottom-border -->




		</section><!-- /.col-md-8 / #ccr-left-section -->
