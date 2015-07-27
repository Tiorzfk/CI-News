
<section id="ccr-main-section">
	<div class="container">


		<section id="ccr-left-section" class="col-md-8">
		<div class="current-page">
<?php
          echo   "
				<a href='".base_url()."'><i class='fa fa-home'></i></a><i class='fa fa-angle-double-right'></i> Contact
			</div>";?> <!-- / .current-page -->

			<section id="ccr-contact-form">
				<p>Contact Us</p>
				<form action="<?php echo "".base_url()."menu_utama/simpankontak" ?>" method="post" id="commentform">
					<input id="author" name="nama" type="text" placeholder="Name">
					<input id="email" name="email" type="email" placeholder="Email">
					<textarea id="comment" name="isi" placeholder="Message" rows="8"></textarea>
					<input name="submit" type="submit" id="submit" value="Submit">
					
				</form> <!-- /#commentform -->
					
			</section> <!-- /#ccr-contact-form -->

		</section><!-- /.col-md-8 / #ccr-left-section -->




		<section  id="ccr-right-section" class="col-md-4">
			<section id="ccr-contact-sidebar">
					<p>
					<span>Contact</span>
					</p>
					<address>
						<p>
							Address:
						</p>
						<p>
							
						</p>
						<p>
							Phone:
						</p>
						<p>
						Email:
						</p>
					</address>

			</section> <!-- /#ccr-contact-sidebar -->
		</section><!-- / .col-md-4  / #ccr-right-section -->


	</div><!-- /.container -->
</section><!-- / #ccr-main-section -->

	 	<div class="footer-social-icons">
	 		<ul>
	 			<li>
	 				<a href="#"  class="google-plus"><i class="fa fa-google-plus"></i></a>
	 			</li>
	 			<li >
	 				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
	 			</li>
	 			<li >
	 				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
	 			</li>
	 			<li >
	 				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
	 			</li>
	 		</ul>
	 		
	 	</div><!--  /.cocial-icons -->

	</div> <!-- /.container -->
</footer>  <!-- /#ccr-footer -->


	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>