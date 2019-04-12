<?php /* Template Name: Our Foods */ get_header(); ?>
<main class="our-foods-page">
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

		<section class="food-filter-section">
			<div class="content">
				<div class="filter-title">BY CATEGORY</div>
				<ul>
					<?php if( have_rows('food_navigation') ):?>
			      <?php while ( have_rows('food_navigation') ) : the_row();?>
							<?php $linkName = get_sub_field('section_link');?>
							<?php $linkName = str_replace(' ', '', $linkName);?>
							<?php $linkName = strtolower($linkName);?>

							<li>
								<a class="c-block-fill" href="#<?php echo $linkName;?>"></a>
								<?php the_sub_field('section_link');?>
							</li>
		      	<?php endwhile;?>
					<?php endif;?>
				</ul>
			</div>
		</section>

		<section class="food-groups-section">
		  <div class="content">
		    <?php if( have_rows('food_categories') ):?>
		      <?php while ( have_rows('food_categories') ) : the_row();?>
		        <?php if( get_row_layout() == 'food_categories_section' ):?>
							<?php $image = get_sub_field('image');?>
							<?php $title = get_sub_field('title');?>
							<?php $title = str_replace(' ', '', $title);?>
							<?php $title = strtolower($title);?>
							<div class="food-group" id="<?php echo $title;?>">
								<div class="words-half c-width-40">
									<hr />
									<h2><?php the_sub_field('title');?></h2>
									<p>
										<?php the_sub_field('description');?>
									</p>
									<div class="button">
										<a class="c-block-fill" href="<?php the_sub_field('button_destination');?>"></a>
										<?php the_sub_field('button_title');?>
									</div>
								</div>
								<div class="image-half c-width-50">
									<img src="<?php echo $image[url];?>">
								</div>

							</div>

		        <?php endif;?>
		      <?php endwhile;?>
		    <?php endif;?>
		  </div>
		</section>
		<?php get_template_part( 'partials/_find-us-bar' ); ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
