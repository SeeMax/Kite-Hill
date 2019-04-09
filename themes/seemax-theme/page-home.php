<?php /* Template Name: Home */ get_header(); ?>
<main class="home-page">
	<?php while (have_posts()) : the_post(); ?>
		<section class="hero-section homeHeroCarousel">
			<?php if( have_rows('home_hero_slides') ):?>
    		<?php while ( have_rows('home_hero_slides') ) : the_row();?>
					<?php $backgroundImage = get_sub_field('slide_background');?>
					<?php $backgroundPosition = get_sub_field('slide_background_position');?>
					<div class="home-hero-slide homeHeroSlide background-image-section"
					style="background: url('<?php echo $backgroundImage[url];?>') <?php echo $backgroundPosition;?>% center no-repeat;background-size:cover;">
						<div class="content">
							<h1 class="c-width-50">
								<?php the_sub_field('slide_headline');?>
							</h1>
							<div class="button">
								<a class="c-block-fill" href="<?php the_sub_field('slide_button_destination');?>"></a>
								<?php the_sub_field('slide_button_title');?>
							</div>
						</div>
					</div>
  			<?php endwhile;?>
			<?php endif;?>
		</section>
		<section class="subhead-section">
			<div class="content">
				<h3><?php the_field('home_call_out');?></h3>
			</div>
		</section>
		<?php if( have_rows('explore_section') ):?>
			<?php while ( have_rows('explore_section') ) : the_row();?>
				<section class="explore-section">
					<div class="water-mark c-width-50">
						<img src="<?php echo get_template_directory_uri(); ?>/img/watermark.png" />
					</div>
					<div class="content">
						<?php $image = get_sub_field('image');?>
						<div class="words-half c-width-50">
							<hr />
							<h2><?php the_sub_field('headline');?></h2>
							<p>
								<?php the_sub_field('body');?>
							</p>
							<div class="button">
								<a class="c-block-fill" href="<?php the_sub_field('button_destination');?>"></a>
								<?php the_sub_field('button_text');?>
							</div>
						</div>
						<div class="image-half c-width-50">
							<img src="<?php echo $image[url];?>">
						</div>
					</div>
				</section>
			<?php endwhile;?>
		<?php endif;?>

		<?php if( have_rows('find_section') ):?>
			<?php while ( have_rows('find_section') ) : the_row();?>

				<?php $image = get_sub_field('image');?>
				<section class="find-section background-image-section"
				style="background-image:url('<?php echo $image[url];?>')">
					<div class="content">

						<h2>
							<?php the_sub_field('headline');?>
						</h2>
						<div class="button outlined-button">
							<a class="c-block-fill" href="<?php the_sub_field('button_destination');?>"></a>
							<span><?php the_sub_field('button_text');?></span>>
						</div>
						<div class="find-logo-row">
							<?php if( have_rows('logos') ):?>
								<?php while ( have_rows('logos') ) : the_row();?>
									<div class="single-logo">
										<?php $image = get_sub_field('single_logo');?>
										<img src="<?php echo $image[url];?>">
									</div>
								<?php endwhile;?>
							<?php endif;?>
						</div>

					</div>
				</section>
			<?php endwhile;?>
		<?php endif;?>

		<section class="home-video-section">
			<div style="padding:56.25% 0 0 0;position:relative;">
				<iframe
					src="https://player.vimeo.com/video/<?php the_field('home_video_section');?>?background=1&color=ffffff&title=0&byline=0&portrait=0&badge=0" 
					style="position:absolute;top:0;left:0;width:100%;height:100%;"
					frameborder="0"
					webkitallowfullscreen
					mozallowfullscreen
					allowfullscreen >
				</iframe>
			</div>
			<script src="https://player.vimeo.com/api/player.js"></script>





		</section>

		<?php if( have_rows('insta_section') ):?>
			<?php while ( have_rows('insta_section') ) : the_row();?>
				<section class="insta-section">
					<div class="content">
						<h2><?php the_sub_field('headline');?></h2>
						<h3><a href="https://www.instagram.com/kitehillfoods/">@kitehillfoods</a></h3>
						<?php echo do_shortcode('[instagram-feed height=300 user="kitehillfoods" showheader=false showbutton=false imagepadding=0 num=5 cols=5 showfollow=false]');?>
					</div>
				</section>
			<?php endwhile;?>
		<?php endif;?>



	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
