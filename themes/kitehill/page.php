<?php get_header(); ?>

<section id="main-content" class="basic-page row" role="main" itemscope itemtype="http://schema.org/WebPage">
	
	<div class="wrapper clearfix">
		
		<div class="col-md-12">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		
				<?php the_content(); ?>	

				<meta itemprop="name" content="<?php echo get_the_title(); ?>">
				<meta itemprop="url" content="<?php echo get_permalink($post->ID); ?>">
				<meta itemprop="image" content="<?php 
					$thumbnail_id = get_post_thumbnail_id($post->ID);
					$thumbnail_object = get_post($thumbnail_id);
					echo $thumbnail_object->guid;
				?>">
				<meta itemprop="description" content="<?php 
					$about=get_post_meta($post->ID,'schema_description',true);
					if (!$about) {
						$about = get_the_excerpt();
					} 
					echo $about;
				?>">
			
			<?php endwhile; else: ?>

				<p>Sorry, no posts matched your criteria.</p>
				
			<?php endif; ?>
			
		</div><!--/col-md-12-->

	</div><!--END WRAPPER-->

</section><!--END MAIN CONTENT-->
	
<?php get_footer(); ?>