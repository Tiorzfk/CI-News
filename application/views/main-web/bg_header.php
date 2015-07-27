<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="" >
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>News </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/css/highslide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/menu_utama/js/fancybox/jquery.fancybox.css" media="screen" />
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<header id="ccr-header">
	<section id="ccr-nav-top" class="fullwidth">
		<div class="">
			<div class="container">
				<nav class="top-menu">
<?php
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$status = $data["status"] = $pecah[2];
			if($status=="user"){
?>
<ul class="left-top-menu">
						<li><i class="fa fa-user"></i><font color="blue">Selamat datang User</font></li>
						<li><a href="<?php echo base_url(); ?>menu_utama/gantipassword" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">Ganti password</a></li>
						<li><a href="<?php echo base_url();?>menu_utama/logout">Logout</a></li>
					</ul><!-- /.left-top-menu -->
<?php
}else if ($status=="admin") { 
?>  
<ul class="left-top-menu">
						<li><font color="red">Selamat datang Admin</font> </li>
						<li><a href="<?php echo base_url(); ?>menu_utama/gantipassword" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">Ganti password</a></li>
						<li><a href="<?php echo base_url(); ?>admin">Masuk Control Panel</a></li>
						<li><a href="<?php echo base_url();?>menu_utama/logout">Logout</a></li>
					</ul><!-- /.left-top-menu -->					
<?php
}
}else{
?>					

					<ul class="right-top-menu pull-right">
						<li><a href="<?php echo base_url(); ?>menu_utama/daftarlogin"onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">Register</a></li>
						<li>
							<form method="post" class="form-inline" role="form" action="<?php echo "".base_url()."menu_utama/login" ?>">
								<input type="text" placeholder="Username..." name="username">
								<input type="password" placeholder="Password..." name="password">
								  <button type="submit"><i class="fa fa-arrow-right"></i></button>
							</form>
						</li>
					</ul> <!--  /.right-top-menu -->
				</nav><?php } ?> <!-- /.top-menu -->
			</div>
		</div>	
	</section> <!--  /#ccr-nav-top  -->




	<section id="ccr-nav-main">
		<nav class="main-menu">
			<div class="container">

				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ccr-nav-main">
				            <i class="fa fa-bars"></i>
			          	</button> <!-- /.navbar-toggle -->
				</div> <!-- / .navbar-header -->

				<div class="collapse navbar-collapse ccr-nav-main">
					<ul class="nav navbar-nav">
						<li><a class="active" href="index.html"></a></li>
						<li class="dropdown">
							<a href="#">News <i class="fa fa-caret-down"></i></a>
							<ul class="sub-menu">
							 <?php
foreach($kategori_berita->result_array() as $daftar)
{
echo"
					          	<li><a href='".base_url()."menu_utama/katberita/".$daftar['id_kategori']."'>".$daftar['nama_kategori']."</a></li>";}?>
								
					        </ul><!-- /.sub-menu -->
						</li><!-- /.dropdown -->
						<li class="dropdown">
						<a href="#">Tutorial <i class="fa fa-caret-down"></i></a>
							<ul class="sub-menu">
							<?php
  foreach($kategori_tutorial->result_array() as $daftar)
  {
  	echo "
								<li><a href='".base_url()."menu_utama/kattutorial/".$daftar['id_kategori_tutorial']."'>".$daftar['nama_kategori']."</a></li>";}?>
							</ul><!-- /.sub-menu -->
						</li><!--  /.dropdown -->
						<li><?php echo "<a href='".base_url()."menu_utama/kontak'>";?>Contact</a></li>
						<li><?php echo "<a href='".base_url()."menu_utama/albumgaleri'>";?>Gallery</a></li>
					</ul> <!-- /  .nav -->
				</div><!-- /  .collapse .navbar-collapse  -->

			</div>	<!-- /.container -->
		</nav> <!-- /.main-menu -->
	</section> <!-- / #ccr-nav-main -->



	

</header> <!-- /#ccr-header -->