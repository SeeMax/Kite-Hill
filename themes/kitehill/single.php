<?php get_header(); ?>

<section id="main-content" class="blog" role="main" itemscope itemtype="http://schema.org/WebPage">
	<div class="wrapper clearfix">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">
			
			<div id="post" class="col-md-7 col-md-offset-1">
				
				<?php the_post_thumbnail('blog'); ?>
				
				<header>
					<h1><?php the_title(); ?></h1>
					<p>Written By: <?php the_author(); ?></p>
					<ul class="share addthis_toolbox addthis_default_style addthis_32x32_style">
						<li><a class="addthis_button_facebook"></a></li>
						<li><a class="addthis_button_twitter"></a></li>
						<li><a class="addthis_button_pinterest_share"></a></li>
						<li><a class="addthis_button_google_plusone_share"></a></li>
					</ul><!--END SHARE-->
				</header>	
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
	
				<!--<section id="post-nav">
				<?php
				$prev_post = get_previous_post();
				if (!empty( $prev_post )): ?>	
					<div class="post-nav prev">
						<a class="arrow-nav" href="<?php echo get_permalink( $prev_post->ID ); ?>"><img src='<?php bloginfo('stylesheet_directory'); ?>/images/arrow-left.png' /></a>
						<a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo get_the_post_thumbnail( $prev_post->ID, 'nav'); ?></a> 
		
						<article class="info">
							<h3><?php echo $prev_post->post_title; ?></h3>
							<p><?php the_time('F j, Y', $prev_post); ?></p>
						</article>
					</div>	
					<?php endif; ?>

					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>		
					<div class="post-nav next">						
						<article class="info">
							<h3><?php echo $next_post->post_title; ?></h3>
							<p><?php the_time('F j, Y', $next_post); ?></p>
						</article>
						<a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail( $next_post->ID, 'nav'); ?></a> 
						<a class="arrow-nav" href="<?php echo get_permalink( $next_post->ID ); ?>"><img src='<?php bloginfo('stylesheet_directory'); ?>/images/arrow-right.png' /></a>
					</div>
				<?php endif; ?>			
				</section>-->
				
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