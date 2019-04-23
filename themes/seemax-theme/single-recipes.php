<?php /* Single Recipe Template */ get_header(); ?>
	<main class="single-recipe-page">
		<?php while (have_posts()) : the_post(); ?>
			<?php if( have_rows('recipe_image') ):?>
			  <?php while ( have_rows('recipe_image') ) : the_row();?>
			    <?php $backgroundImage = get_sub_field('image');?>
					<?php $backgroundPosition = get_sub_field('background_position');?>
			    <section class="hero-section background-image-section"
						style="background: url('<?php echo $backgroundImage[url];?>') <?php echo $backgroundPosition;?>% center no-repeat;background-size:cover;">
			    </section>
			  <?php endwhile;?>
			<?php endif;?>
	    <section class="recipe-block-section">
        <div class="content">
          <div class="single-recipe-header">
            <div class="single-yield">
              YIELD: <?php the_field('recipe_yield');?>
            </div>
            <div class="single-time">
              TIME: <?php the_field('recipe_time');?>
            </div>
            <!-- Add Jetpack Icons Here-->
            <?php if ( function_exists( 'sharing_display' ) ) {
              sharing_display( '', true );
            };?>
          </div>
          <div class="single-recipe-intro">
            <?php $terms = get_the_terms( get_the_ID(), 'recipe-type' );?>
            <?php if ( $terms && ! is_wp_error( $terms ) ):?>
                <?php foreach ( $terms as $term ):?>
                    <div class="recipe-categories"><?php echo $term->name;?></div>
                <?php endforeach; ?>
            <?php endif;?>
            <h1><?php the_title();?></h1>
            <p><?php the_content();?></p>
          </div>
					<div class="ingredient-method-group">
	          <div class="single-recipe-ingredients c-width-45">
	            Ingredients
	            <?php if( have_rows('ingredients_list') ):?>
	              <?php while ( have_rows('ingredients_list') ) : the_row();?>
	                <div class="single-recipe-single-ingredient">
	                  <?php the_sub_field('single_ingredient');?>
	                </div>
	              <?php endwhile;?>
	            <?php endif;?>
	          </div>
	          <div class="single-recipe-steps c-width-55">
	            Method
	            <?php if( have_rows('method_steps') ): $counter = 1;?>
	              <?php while ( have_rows('method_steps') ) : the_row();?>
	                <div class="single-recipe-single-step">
	                  <div class="step-number">
	                    Step <?php echo $counter;?>.
	                  </div>
	                  <?php the_sub_field('single_step');?>
	                </div>
	              <?php $counter++; endwhile;?>
	            <?php endif;?>
	          </div>
					</div>
					<div class="ingredient-method-group">

						<?php if( have_rows('extra_ingredients_lists') ):?>
							<?php while ( have_rows('extra_ingredients_lists') ) : the_row();?>
								<?php if( have_rows('one_extra_ingredient_list') ):?>
									<?php while ( have_rows('one_extra_ingredient_list') ) : the_row();?>

										<div class="single-recipe-ingredients c-width-45">
											Title
											<?php the_sub_field('one_ingredient_list_title');?>
											<?php if( have_rows('extra_list_ingredient_list') ):?>
												<?php while ( have_rows('extra_list_ingredient_list') ) : the_row();?>
													<div class="single-recipe-single-ingredient">
														<?php the_sub_field('extra_single_ingredient');?>
													</div>
												<?php endwhile;?>
											<?php endif;?>
										</div>

									<?php endwhile;?>
								<?php endif;?>
							<?php endwhile;?>
						<?php endif;?>
						<?php if( have_rows('extra_method_lists') ):?>
						  <?php while ( have_rows('extra_method_lists') ) : the_row();?>

						    <?php if( have_rows('one_extra_method_list') ):?>
						      <?php while ( have_rows('one_extra_method_list') ) : the_row();?>

										<div class="single-recipe-steps c-width-55">
						        	<?php the_sub_field('one_method_list_title');?>
											<?php if( have_rows('extra_list_method_list') ): $counter = 1;?>
							          <?php while ( have_rows('extra_list_method_list') ) : the_row();?>

					                <div class="single-recipe-single-step">
					                  <div class="step-number">
					                    Step <?php echo $counter;?>.
					                  </div>
					                  <?php the_sub_field('extra_single_step');?>
					                </div>

						             <?php $counter++; endwhile;?>
						           <?php endif;?>
						         </div>

									<?php endwhile;?>
								<?php endif;?>
							<?php endwhile;?>
						<?php endif;?>
					</div>
          <div class="single-recipe-products-used">
            <?php if( have_rows('product_used_area') ):?>
              <?php while ( have_rows('product_used_area') ) : the_row();?>
                <?php if( have_rows('single_product_used') ):?>
                  <?php while ( have_rows('single_product_used') ) : the_row();?>
                    <div class="words-half c-width-45">
                      <h3>This recipe uses:</h3>
                      <h3 class="bold-hthree"><?php the_sub_field('product_name');?></h3>
                    </div>
                    <div class="image-half c-width-55">
                      <?php $productImage = get_sub_field('product_image');?>
                      <div class="prod-image">
                        <img src="<?php echo $productImage['url'];?>">
                      </div>
                      <div class="button outlined-button">
                        <a class="c-block-fill" href="where-to-buy"></a>
                        Find In Store
                      </div>
                    </div>
                  <?php endwhile;?>
                <?php endif;?>
              <?php endwhile;?>
            <?php endif;?>
          </div>
        </div>
      </section>
      <section class="similar-recipe-section">
        <div class="content">
          <h2>Explore Similar Recipes</h2>
          <?php $taxterm = get_field('similar_recipe_category');?>
          <?php $taxShow = $taxterm->name;?>
          <?php $currentID = get_the_ID();?>


          <?php
          $args = array(
          'orderby' => 'ASC',
          'post_type' => 'recipes',
          'recipe-type' => $taxShow,
          'showposts' => 4,
          'post__not_in' => array($currentID),
          );
          $the_query = new WP_Query( $args );?>
          <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="single-similar-recipe c-width-23">
              <a class="c-block-fill" href="<?php the_permalink();?>"></a>
              <?php if( have_rows('recipe_image') ):?>
                <?php while ( have_rows('recipe_image') ) : the_row();?>
                  <?php $backgroundImage = get_sub_field('image');?>
                  <?php $backgroundPosition = get_sub_field('background_position');?>
                  <div class="similar-recipe-image background-image-section"
                    style="background: url('<?php echo $backgroundImage[url];?>') center center no-repeat;background-size:cover;">
                  </div>
                <?php endwhile;?>
              <?php endif;?>
              <h4><?php the_title();?></h4>
            </div>
          <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
          <?php wp_reset_query(); ?>

      </div>
    </section>
    <?php get_template_part( 'partials/_subscribe-bar' ); ?>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
