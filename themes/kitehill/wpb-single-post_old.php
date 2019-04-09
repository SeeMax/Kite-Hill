<?php
/*
 * Template Name: Recipe Page
 * Template Post Type: post, page, product
 */

get_header();  ?>



 <?php if(have_posts()) : while(have_posts()) : the_post(); ?>


<div class="container" style="background:#f4f4f4; margin-top:-20px; padding:20px;">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center; margin-bottom:20px;  text-transform: uppercase;">
			<h1><?php the_title()?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center; margin-bottom:50px">
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail(array(500,500), array( 'class' => 'responsive-on-xs'));} ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center; font-size:18px">
		<?php the_content();?>
		</div>
	</div>








<?php endwhile; endif;?>

</div>
