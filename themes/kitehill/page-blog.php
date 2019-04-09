<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<section id="main-content" class="blog" role="main" itemscope itemtype="http://schema.org/WebPage">
	<div class="wrapper clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="row">
		
			<nav id="page-nav" class="col-md-10 col-md-offset-1">
				<h1><?php echo the_title(); ?></h1>
				<?php wp_nav_menu( array( 'theme_location' => 'blog_menu' ) ); ?>
			</nav><!--END PAGE NAV-->
		
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
			
		</div>	
		<div class="row">
			
			<div class="col-md-7 col-md-offset-1">

			<?php $blog = new WP_Query( 'posts_per_page=10' ); ?>				
			<?php if ($blog->have_posts()) : ?>				
			<?php while ( $blog->have_posts()) : $blog->the_post(); ?>
				<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
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
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog', array('class'=>'alignleft')); ?></a>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p>Written By: <?php the_author(); ?></p>
							<ul class="share addthis_toolbox addthis_default_style addthis_32x32_style">
								<li><a class="addthis_button_facebook"></a></li>
								<li><a class="addthis_button_twitter"></a></li>
								<li><a class="addthis_button_pinterest_share"></a></li>
								<li><a class="addthis_button_google_plusone_share"></a></li>
							</ul><!--END SHARE-->
						<p><?php the_excerpt(); ?></p>
						<a class="btn button more" href="<?php the_permalink(); ?>">Read More »</a>
					</article><!--END POSTS-->	
			
				<?php endwhile; ?>
				<?php endif; ?>	
				<?php wp_reset_query(); ?>
				
				</div>
				
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>	
				
			</div>	
					
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

	</div><!--END WRAPPER-->

</section><!--END MAIN CONTENT-->
	
<?php get_footer(); ?>