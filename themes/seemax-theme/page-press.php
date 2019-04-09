<?php /* Template Name: Press and Awards */ get_header(); ?>
	<main class="press-page">
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
			<section class="news-section newsSection">
	      <div class="content">
					<h2>In The News</h2>
					<div class="news-block firstNews">
						<?php $loop = new WP_Query( array(
							'post_type' => 'news',
							'posts_per_page' => 3
						));?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="single-news singleNews c-width-33-3">
								<?php $thisImage = get_field('publication_image');?>
								<div class="pub-image">
									<img src="<?php echo $thisImage[url];?>">
								</div>
								<hr />
								<p>
									<?php the_field('text');?>
								</p>
								<div class="button single-news-button">
									<a class="c-block-fill" href="<?php the_field('link');?>" target="_blank"></a>
									Read More
								</div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
					<div class="news-block more-news moreNews">
						<?php $loop = new WP_Query( array(
							'post_type' => 'news',
							'posts_per_page' => 6,
							'offset'=> 3
						));?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="single-news singleNews c-width-33-3">
								<?php $thisImage = get_field('publication_image');?>
								<div class="pub-image">
									<img src="<?php echo $thisImage[url];?>">
								</div>
								<hr />
								<p>
									<?php the_field('text');?>
								</p>
								<div class="button single-news-button">
									<a class="c-block-fill" href="<?php the_field('link');?>" target="_blank"></a>
									Read More
								</div>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
					<div class="see-all-link showMoreNews">See More</div>
	    	</div>
	    </section>
	    <section class="yogurt-award-section">
        <div class="content">
					<?php if( have_rows('yogurt_award_section') ):?>
						<?php while ( have_rows('yogurt_award_section') ) : the_row();?>
							<div class="left-half c-width-50">
								<?php $thisImage = get_sub_field('image');?>
								<img src="<?php echo $thisImage[url];?>">
							</div>
							<div class="right-half c-width-50">
								<h2><?php the_sub_field('headline');?></h2>
								<?php if(get_sub_field('text')):?>
									<p><?php the_sub_field('text');?></p>
								<?php endif;?>
							</div>
						<?php endwhile;?>
					<?php endif;?>
        </div>
	    </section>
			<section class="cant-find-section">
			  <div class="content">
					<h3 class='thick-blue'>Questions or comments?</h3>
					<h3>
						Send us an email at
						<a href="mailto:<?php the_field('email_address', 'options');?>">
							<?php the_field('email_address', 'options');?>
						</a>
					</h3>

					<h3>
						or give us a call at
						<a class="thick-brown" href="tel:<?php the_field('phone_number', 'options');?>">
							<?php the_field('phone_number', 'options');?>
						</a>
					</h3>
				</div>
				<img class="faq-watermark" src="<?php echo get_template_directory_uri(); ?>/img/faq-watermark.png" >
			</section>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
