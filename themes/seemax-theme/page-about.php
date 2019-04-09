<?php /* Template Name: About */ get_header(); ?>
<main class="about-page">
	<?php while (have_posts()) : the_post(); ?>

		<?php if( have_rows('hero_section') ):?>
		  <?php while ( have_rows('hero_section') ) : the_row();?>
		    <?php $backgroundImage = get_sub_field('hero_image');?>
				<?php $backgroundPosition = get_sub_field('hero_background_position');?>
		    <section class="hero-section background-image-section"
					style="background: url('<?php echo $backgroundImage[url];?>') <?php echo $backgroundPosition;?>% center no-repeat;background-size:cover;">
	        <div class="content">
	          <h1 class="c-width-50"><?php the_sub_field('hero_headline');?></h1>
	        </div>
		    </section>
		  <?php endwhile;?>
		<?php else:?>
			<section class="hero-section hero-section-no-pic">
				<div class="content">
					<h1 class="c-width-50"><?php the_title(); ?></h1>
				</div>
			</section>
		<?php endif;?>

    <section class="opening-section">
			<?php if( have_rows('opening_section') ):?>
			  <?php while ( have_rows('opening_section') ) : the_row();?>
				<?php $thisImage = get_sub_field('image');?>
      	<div class="content">
					<div class="left-half c-width-50">
						<h2><?php the_sub_field('headline');?></h2>
					</div>
					<div class="right-half c-width-50">
						<p>
						  <?php the_sub_field('body');?>
						</p>
					</div>
      	</div>
			<?php endwhile;?>
		<?php endif;?>
    </section>

		<section class="story-section">
			<?php if( have_rows('story_section') ):?>
				<?php while ( have_rows('story_section') ) : the_row();?>
				<img class="watermark" src="<?php echo get_template_directory_uri(); ?>/img/watermark-100.png" >
				<?php $thisImage = get_sub_field('image');?>
				<img class="food-image" src="<?php echo $thisImage[url];?>">
				<div class="content">
					<div class="left-half c-width-50">
						<p>
						  <?php the_sub_field('body');?>
						</p>
						<div class="button">
							<a class="c-block-fill" href="<?php the_sub_field('button_destination');?>"></a>
							<?php the_sub_field('button_text');?>
						</div>
					</div>
					<div class="right-half c-width-50">
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		</section>

		<section class="process-section">
			<?php if( have_rows('process_section') ):?>
				<?php while ( have_rows('process_section') ) : the_row();?>
				<?php $thisImage = get_sub_field('image');?>
				<div class="background-image-section c-width-50"
				style="background: url('<?php echo $thisImage[url];?>') <?php echo $backgroundPosition;?>% center no-repeat;background-size:cover;">
				</div>
				<div class="content">
					<div class="left-half c-width-50">
					</div>
					<div class="right-half c-width-50">
						<h2><?php the_sub_field('headline');?></h2>
						<p>
						  <?php the_sub_field('body');?>
						</p>
						<div class="button">
							<a class="c-block-fill" href="<?php the_sub_field('button_destination');?>"></a>
							<?php the_sub_field('button_text');?>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		</section>

		<section class="mission-section">
			<?php if( have_rows('mission_section') ):?>
				<?php while ( have_rows('mission_section') ) : the_row();?>
				<img class="watermark" src="<?php echo get_template_directory_uri(); ?>/img/watermark-6.png" >
				<div class="content">
					<div class="left-half c-width-50">
						<h2><?php the_sub_field('headline');?></h2>
					</div>
					<div class="right-half c-width-50">
						<h3>
						  <?php the_sub_field('body');?>
						</h3>
					</div>
				</div>
			<?php endwhile;?>
		<?php endif;?>
		</section>

		<section class="news-section">
      <div class="content">
				<h2>In The News</h2>
				<?php $loop = new WP_Query( array(
					'post_type' => 'news',
					'posts_per_page' => 3
				));?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="single-news c-width-33-3">
						<?php $thisImage = get_field('publication_image');?>
						<div class="pub-image">
							<img src="<?php echo $thisImage[url];?>">
						</div>
						<hr />
						<p>
							<?php the_field('text');?>
						</p>
						<div class="news-link">
							<a class="c-block-fill" href="<?php the_field('link');?>" target="_blank"></a>
							Read More
						</div>
					</div>
				<?php endwhile; wp_reset_query(); ?>
				<div class="button see-all-button">
					<a class="c-block-fill" href="/press-and-awards"></a>
					See All
				</div>
    	</div>
    </section>
		<?php get_template_part( 'partials/_subscribe-bar' ); ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
