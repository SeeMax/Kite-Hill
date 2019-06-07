<?php /* Template Name: Products */ get_header(); ?>
<main class="products-page">
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

		<!-- <section class="product-filter-section">
			<div class="content">
				<div class="filter-title">BY CATEGORY</div>
				<ul>
					<li><a class="active" href="">All</a></li>
					<li><a href="">5.3oz</a></li>
					<li><a href="">16oz</a></li>
					<li><a href="">32oz</a></li>
				</ul>
			</div>
		</section> -->

		<section class="products-section">
		  <div class="content">
		    <?php if( have_rows('products') ):?>
					<?php $counter = 1;?>
		      <?php while ( have_rows('products') ) : the_row();?>
		        <?php if( get_row_layout() == 'single_product' ):?>
							<?php $countUp = $counter++;?>
							<div class="single-product">
                <div class="image-half c-width-45">
                  <div class="main-image slider-for-<?php echo $countUp;?>">
                    <?php if( have_rows('images') ):?>
        		          <?php while ( have_rows('images') ) : the_row();?>
                        <?php $image = get_sub_field('single_image');?>
                        <img src="<?php echo $image[url];?>">
                      <?php endwhile;?>
                    <?php endif;?>
                  </div>
                  <div class="image-nav slider-nav-<?php echo $countUp;?>">
                    <?php if( have_rows('images') ):?>
                      <?php while ( have_rows('images') ) : the_row();?>
                        <?php $image = get_sub_field('single_image');?>
                        <img src="<?php echo $image[url];?>">
                      <?php endwhile;?>
                    <?php endif;?>
                  </div>

                </div>

								<div class="words-half c-width-50">
									<hr />
									<h2><?php the_sub_field('title');?></h2>
									<p>
										<?php the_sub_field('description');?>
									</p>
                  <div class="ingredients">
                    <span>INGREDIENTS</span><br />
										<?php the_sub_field('ingredients');?>
									</div>
                  <div class="sizes">
                    <span>SIZES AVAILABLE</span><br />
                    <?php $sizes = get_sub_field('sizes');
                    foreach ( $sizes as $size ) :?>
                      <div class="size-disc">
                        <?php echo $size['label']; ?>
                      </div>
                    <?php endforeach; ?>
									</div>
                  <div class="callouts">
                    <?php if( have_rows('callouts') ):?>
            		      <?php while ( have_rows('callouts') ) : the_row();?>
    										<div class="single-callout">
                          <?php the_sub_field('single_callout');?>
                        </div>
                      <?php endwhile;?>
                    <?php endif;?>
									</div>
									<div class="health-logos">
										<?php $logos = get_sub_field('health_logo');
										if( $logos && in_array('gmo', $logos) ): ?>
										<img class="img1" src="<?php echo get_template_directory_uri(); ?>/img/non-gmo-icon.jpg" >
										<?php endif; ?>
										<?php if( $logos && in_array('kosher', $logos) ): ?>
										<img class="img2" src="<?php echo get_template_directory_uri(); ?>/img/kosher-icon-2.jpg" >
										<?php endif; ?>
									</div>

								</div>

							</div>

		        <?php endif;?>
		      <?php endwhile;?>
		    <?php endif;?>
		  </div>
		</section>

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


					</div>
				</section>
			<?php endwhile;?>
		<?php endif;?>

	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
