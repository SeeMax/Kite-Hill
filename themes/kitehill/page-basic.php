<?php
/*
Template Name: Basic
*/
?>
<?php get_header(); ?>

<section id="main-content" class="basic-page" role="main" itemscope itemtype="http://schema.org/WebPage">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>">
			<div class="wrapper clearfix">
				<?php the_content(); ?>	
			</div><!--END WRAPPER-->	
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
		</article>
					
	<?php endwhile; else: ?>

		<article class="sub">
			<div class="wrapper">
				<p>Sorry, no posts matched your criteria.</p>
			</div><!--END WRAPPER-->	
		</article>

	<?php endif; ?>

</section><!--END MAIN CONTENT-->
	
<?php get_footer(); ?>