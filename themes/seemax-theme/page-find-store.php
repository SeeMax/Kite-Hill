<?php /* Template Name: Find Store */ get_header(); ?>
<main class="find-store-page">
	<?php while (have_posts()) : the_post(); ?>

		<?php if( have_rows('hero_section') ):?>
		  <?php while ( have_rows('hero_section') ) : the_row();?>
		    <?php $backgroundImage = get_sub_field('hero_image');?>
				<?php $backgroundPosition = get_sub_field('hero_background_position');?>
		    <section class="hero-section background-image-section"
					style="background: url('<?php echo $backgroundImage[url];?>') <?php echo $backgroundPosition;?>% center no-repeat;background-size:cover;">
	        <div class="content">
	          <h1 class="c-width-90"><?php the_sub_field('hero_headline');?></h1>
	        </div>
		    </section>
		  <?php endwhile;?>
		<?php endif;?>

		<section class="destini-section">
			<script src="//destinilocators.com/kitehill/site/install/"></script>
		</section>

		<?php if( have_rows('new_look_section') ):?>
		  <?php while ( have_rows('new_look_section') ) : the_row();?>
		    <?php $newImage = get_sub_field('image');?>
		    <section class="new-look-section">
					<div class="content">
						<hr />
	         	<h2 class="c-width-50"><?php the_sub_field('headline');?></h2>
					 	<img src="<?php echo $newImage[url];?>">
					</div>
		    </section>
		  <?php endwhile;?>
		<?php endif;?>

	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
