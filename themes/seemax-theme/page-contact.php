<?php /* Template Name: Contact */ get_header(); ?>
<main class="contact-page">
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

		<section class="contact-options-section">
		  <div class="content">
				<div class="contact-form-half c-width-50">
					<h2>Send Us A Message</h2>
					<?php echo do_shortcode('[contact-form-7 id="185" title="Contact Page Form"]');?>
				</div>
				<div class="contact-links-half c-width-40">
					<div class="contact-links-part">
						<?php if( have_rows('phone_area') ):?>
							<?php while ( have_rows('phone_area') ) : the_row();?>
								<h2>Phone</h2>
								<a class="phone-link" href="tel:<?php the_sub_field('phone_number');?>"><?php the_sub_field('phone_number');?></a>
							<?php endwhile;?>
						<?php endif;?>
					</div>
					<div class="contact-links-part">
						<?php if( have_rows('email_area') ):?>
						  <?php while ( have_rows('email_area') ) : the_row();?>
								<h2>Email Contacts</h2>
								Product-related questions or comments:<br />
								<a href="mailto:<?php the_sub_field('product_email');?>"><?php the_sub_field('product_email');?></a><br />
								<br />
								<!-- Food service sales inquiries:<br />
								<a href="mailto:<?php the_sub_field('food_email');?>"><?php the_sub_field('food_email');?></a><br />
								<br /> -->
								Sales inquiries:<br />
						    <a href="mailto:<?php the_sub_field('retail_email');?>"><?php the_sub_field('retail_email');?></a><br />
								<br />
								Media inquiries:<br />
								<a href="mailto:<?php the_sub_field('media_email');?>"><?php the_sub_field('media_email');?></a><br />
						  <?php endwhile;?>
						<?php endif;?>
					</div>
					<div class="contact-links-part">
						<?php if( have_rows('address_area') ):?>
						  <?php while ( have_rows('address_area') ) : the_row();?>
								<h2>Address</h2>
						    <?php the_sub_field('address');?>
						  <?php endwhile;?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</section>



	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
