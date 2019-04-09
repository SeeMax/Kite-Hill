<?php get_header(); ?>

<section id="main-content" class="blog" role="main">
	<div class="wrapper clearfix">
		<div class="row col-md-10 col-md-offset-1">
			<article id="post-<?php the_ID(); ?>">

				<?php if (have_posts()) : ?>

					<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
					<?php if (is_category()) { ?>
					<h1><?php single_cat_title(); ?></h1>
			
					<?php }elseif (is_tax()) { 				
						global $wp_query;
					    $term = $wp_query->get_queried_object();
					    $title = $term->name;    
					?>
					<h1>Archive for the &ldquo;<?php echo $title; ?>&rdquo;</h1>

					<?php } elseif(is_tag()) { ?>
					<h1>Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>

					<?php } elseif (is_day()) { ?>
					<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

					<?php } elseif (is_month()) { ?>
					<h1>Archive for <?php the_time('F, Y'); ?></h1>

					<?php } elseif (is_year()) { ?>
					<h1>Archive for <?php the_time('Y'); ?></h1>

					<?php } elseif (is_author()) { ?>
					<h1>Author Archive</h1>

					<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1>Blog Archives</h1>

				<?php } ?>
					<p><?php category_description(); ?></p>
				</article>
		
				<?php while (have_posts()) : the_post(); ?>

					<section class="post clearfix">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog', array('class'=>'alignleft')); ?></a>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<ul class="share addthis_toolbox addthis_default_style addthis_32x32_style">
							<li><a class="addthis_button_facebook"></a></li>
							<li><a class="addthis_button_twitter"></a></li>
							<li><a class="addthis_button_pinterest_share"></a></li>
							<li><a class="addthis_button_google_plusone_share"></a></li>
						</ul><!--END SHARE-->
						<p><?php the_excerpt(); ?></p>
						<a class="btn button more" href="<?php the_permalink(); ?>">Read More »</a>
					</section><!--END POSTS-->	
		
				<?php endwhile; ?>
		
					<nav>
						<p><?php posts_nav_link('&nbsp;&bull;&nbsp;'); ?></p>
					</nav>

				<?php else : ?>
			
					<article id="no-posts" class="intro-content">
						<h4>There are no posts in this category. View some other recent posts:</h4>
						<ul>
							<?php 
							$recent_posts = wp_get_recent_posts('numberposts=3','OBJECT');
							foreach( $recent_posts as $recent ): ?>
							<li class="post-nav">
								<a href="<?php echo get_permalink($recent->ID); ?>"><?php echo get_the_post_thumbnail( $recent->ID, 'nav'); ?></a> 
				
								<article class="info">
									<h3><?php echo $recent->post_title; ?></h3>
									<p><?php echo get_the_time('F j, Y', $recent->ID); ?></p>
								</article>
							</li><!--END PREV-->
							<?php endforeach; ?>
						
						</ul>
					</article>

				<?php endif; ?>
			</div>	
		
		</div>
	</section>
<?php get_footer(); ?>