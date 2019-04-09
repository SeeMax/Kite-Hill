<?php /* Template Name: FAQ */ get_header(); ?>
<main class="faq-page">
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
		<?php endif;?>

		<section class="qa-section">
		  <div class="content">
		    <?php if( have_rows('question_blocks') ):?>
		      <?php while ( have_rows('question_blocks') ) : the_row();?>
		        <?php if( get_row_layout() == 'faq_section' ):?>
							<div class="faq-qa-section">
								<h2 class="c-width-50"><?php the_sub_field('title');?></h2>
								<?php if( have_rows('question-answer') ):?>
						      <?php while ( have_rows('question-answer') ) : the_row();?>
										<div class="single-qa">

											<div class="single-qa-content">
												<div class="single-qa-q qaToggle">
													<div class="single-qa-close qaClose">+</div>
													<?php the_sub_field('question');?>
												</div>
												<div class="single-qa-a qaAnswer">
													<?php the_sub_field('answer', false, false);?>
												</div>
											</div>
										</div>
						      <?php endwhile;?>
						    <?php endif;?>
							</div>

		        <?php endif;?>
		      <?php endwhile;?>
		    <?php endif;?>
		  </div>
		</section>
		<section class="cant-find-section">
		  <div class="content">
				<h3 class='thick-blue'>Can’t find what you’re looking for?</h3>
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
		</section>

		<img class="faq-watermark" src="<?php echo get_template_directory_uri(); ?>/img/faq-watermark.png" >
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
