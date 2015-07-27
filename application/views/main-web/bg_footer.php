</div>
<aside id="ccr-footer-sidebar">
	<div class="container">

		<ul>
			<li class="col-md-3">
				<h5>About Us</h5>
				<div class="about-us">
					Web ini dibuat hanya untuk lebih mengenal website terutama bahasa pemrograman Php.
				</div>
				<!-- / .navbar-header -->
				
			</li>
			<li class="col-md-3">
				<h5>Berita Populer</h5>
				<ul>
				 <?php
foreach($berita_populer->result_array() as $pop)
{
echo "
					<li>
						<a href=".base_url()."menu_utama/detailberita/".$pop['id_berita'].">".$pop['judul_berita']."</a>
					</li>";}?>
				</ul>
				
			</li>
			<li class="col-md-3">
				<h5>Tutorial Populer</h5>
				<ul>
				<?php
foreach ($tutorial_populer->result() as $new) 
{
echo"
					<li>
						<a href='".base_url()."menu_utama/detailtutorial/".$new->id_tutorial."'>".$new->judul_tutorial."</a>
					</li>";}?>
				</ul>
				
			</li>
			<li class="col-md-3">
				<h5>Tags</h5>
				<div class="tagcloud">
				<?php
foreach($kategori_berita->result_array() as $daftar)
{

echo"
					<a href='".base_url()."menu_utama/katberita/".$daftar['id_kategori']."'>".$daftar['nama_kategori']."</a>";}?>				
					
				</div>
				<div class="tagcloud">
				<?php
	  foreach($kategori_tutorial->result_array() as $daftar)
{
echo"			
<a href='".base_url()."menu_utama/kattutorial/".$daftar['id_kategori_tutorial']."'>".$daftar['nama_kategori']."</a>";}?>
</div>
			</li>
		</ul>
	</div>
	
</aside> <!-- /#ccr-footer-sidebar -->


<footer id="ccr-footer">
	<div class="container">
	 	<div class="copyright">
	 		&copy; 2014, Copyrights <a href="http://codexcoder.com"></a> 
	 	</div> <!-- /.copyright -->

	</div> <!-- /.container -->
</footer>  <!-- /#ccr-footer -->

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/menu_utama/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/menu_utama/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/menu_utama/js/custom.js"></script>
	<script src="<?php echo base_url(); ?>asset/menu_utama/js/highslide-with-html.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/menu_utama/js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/menu_utama/js/album/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/menu_utama/js/album/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/menu_utama/js/album/flex-slider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/menu_utama/js/album/main.js" charset="utf-8"></script>
	<script type="text/javascript">
hs.graphicsDir = 'http://localhost/news/asset/menu_utama/img/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';

</script>


</body>
</html>