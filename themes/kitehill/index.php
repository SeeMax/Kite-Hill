<?php get_header(); ?>

<section id="main-content" class="row" role="main" itemscope itemtype="http://schema.org/WebPage">	
	
	<div class="wrapper">
		<div class="col-md-12">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
	
				<meta itemprop="name" content="<?php echo get_bloginfo('name'); ?>">
				<meta itemprop="url" content="<?php echo get_bloginfo('url'); ?>">
				<meta itemprop="image" content="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/logo.png" >
				<meta itemprop="description" content="<?php 
					$about=get_post_meta($home->ID,'schema_description',true);
					echo $about;
				?>">

				<?php the_content(); ?>
		
			<?php endwhile; ?>
			<?php endif; ?>	
			
		</div>	
	</div>

</section><!--END MAIN-->

<?php get_footer(); ?>