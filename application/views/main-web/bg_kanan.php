
	<aside id="ccr-right-section" class="col-md-4 ccr-home">
			
			<section id="sidebar-popular-post">
				<div class="ccr-gallery-ttile">
					<span></span> 
					<p><strong>Popular News</strong></p>
					</div>
<ul>					<!-- .ccr-gallery-ttile -->
								 <?php
foreach($berita_populer->result_array() as $pop)
{
echo "
					<li>
						<a href=".base_url()."menu_utama/detailberita/".$pop['id_berita']."><img src='".base_url()."asset/menu_utama/berita/".$pop['gambar']."' alt='Popular Post'></a>
						<a href=".base_url()."menu_utama/detailberita/".$pop['id_berita'].">".$pop['judul_berita']."</a>
						<div class='date-like-comment'>
							<span class='date'><time datetime>".$pop['tanggal']."</time></span>
							
						</div>
					</li>";}?>
					</ul>
				
			</section> <!-- /#sidebar-popular-post -->

			<section id="sidebar-older-post">
				<div class="ccr-gallery-ttile">
					<span></span> 
					<p><strong>Popular Tutorial</strong></p>
				</div> <!-- .ccr-gallery-ttile -->
				<ul>
				<?php
foreach ($tutorial_populer->result() as $new) 
{
echo"
					<li>
						<a href='".base_url()."menu_utama/detailtutorial/".$new->id_tutorial."'><img src='".base_url()."asset/menu_utama/tutorial/".$new->gambar."'>
						<a href='".base_url()."menu_utama/detailtutorial/".$new->id_tutorial."'>".$new->judul_tutorial."</a>
						<div class='date-like-comment'>
							<span class='date'><time datetime>".$new->tanggal."</time></span>
							
						</div>
					</li>";}?>
				</ul>
			</section> <!-- /#sidebar-older-post -->

</section>