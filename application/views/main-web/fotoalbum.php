
<section id="ccr-main-section">
	<div class="container">
		<section id="ccr-left-section" class="col-md-8">

			<div class="current-page">
				<a href="<?php echo base_url();?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a>
			</div> <!-- / .current-page -->

			<section id="ccr-blog-s2">
			<ul id="list" class="portfolio_list">
			<?php
			foreach($foto_album->result_array() as $b)
{
echo"
  <li class='list_item'>
	                        <div class='view view-first'>
	                            <a href =".base_url()."asset/menu_utama/album/".$b['foto']."  class='fancybox' data-rel='gallery1' border='0' width=20>
	                                <img src='".base_url()."asset/menu_utama/album/".$b['foto']."' alt='Title Goes Here'>
	                                <span class='mask'>
	                                    <span class='fui-search zoom'></span>
	                                </span>
	                            </a>
	                        </div>
	                    </li>";}?>
						</ul>
					</section>
					</section>