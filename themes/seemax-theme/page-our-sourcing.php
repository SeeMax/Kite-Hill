<?php /* Template Name: Our Sourcing */ get_header(); ?>

	<main class="our-sourcing-page">
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
			<?php if( have_rows('our_farm_section') ):?>
				<?php while ( have_rows('our_farm_section') ) : the_row();?>
					<section class="sourcing-sub-section">
						<div class="content">
							<div class="image-half c-width-50">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
							</div>
							<div class="words-half c-width-50">
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						</div>
					</section>
				<?php endwhile;?>
			<?php endif;?>
			<?php if( have_rows('bees_section') ):?>
				<?php while ( have_rows('bees_section') ) : the_row();?>
					<section class="sourcing-sub-section">
						<div class="content">
							<div class="image-half c-width-50">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
							</div>
							<div class="words-half c-width-50">
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						</div>
					</section>
				<?php endwhile;?>
			<?php endif;?>
			<?php if( have_rows('almond_milk_section') ):?>
				<?php while ( have_rows('almond_milk_section') ) : the_row();?>
					<section class="sourcing-sub-section">
						<div class="content">
							<div class="image-half c-width-50">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
							</div>
							<div class="words-half c-width-50">
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						</div>
					</section>
				<?php endwhile;?>
			<?php endif;?>
			<section class="sourcing-sub-section sub-third-container">
				<div class="content">
					<?php if( have_rows('culture_section') ):?>
						<?php while ( have_rows('culture_section') ) : the_row();?>
							<div class="sourcing-sub-third c-width-33-3">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						<?php endwhile;?>
					<?php endif;?>
					<?php if( have_rows('curds_section') ):?>
						<?php while ( have_rows('curds_section') ) : the_row();?>
							<div class="sourcing-sub-third c-width-33-3">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						<?php endwhile;?>
					<?php endif;?>
					<?php if( have_rows('fresh_almond_section') ):?>
						<?php while ( have_rows('fresh_almond_section') ) : the_row();?>
							<div class="sourcing-sub-third c-width-33-3">
								<?php $image = get_sub_field('image');?>
								<img src='<?php echo $image[url];?>'>
								<h2><?php the_sub_field('headline');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						<?php endwhile;?>
					<?php endif;?>
				</div>
			</section>
			<?php $bottomImage = get_field('bottom_image');?>
			<section class="bottom-image-section background-image-section"
				style="background: url('<?php echo $bottomImage[url];?>') center center no-repeat;background-size:cover;">
				<div class="content">
				</div>
			</section>
			<?php get_template_part( 'partials/_find-us-bar' ); ?>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
