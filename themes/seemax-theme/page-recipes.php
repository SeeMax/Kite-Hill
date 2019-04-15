<?php /* Template Name: Recepies */ get_header(); ?>
	<main class="recipes-page">
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
			<section class="page-intro-section">
		    <div class="content">
					<h3><?php the_field('page_intro');?></h3>
				</div>
			</section>
			<section class="recipes-section recent-recipes-section">
			    <div class="content">
						<h2>Most Recent Recipes</h2>
						<?php
	          $args = array(
						'orderby' => 'ASC',
	          'post_type' => 'recipes',
	          'showposts' => 3,
	          );
	          $the_query = new WP_Query( $args );?>
	          <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	            <div class="single-recent-recipe c-width-32">
	              <a class="c-block-fill" href="<?php the_permalink();?>"></a>
								<div class="single-recent-main-content">
									<?php if( have_rows('recipe_image') ):?>
		                <?php while ( have_rows('recipe_image') ) : the_row();?>
		                  <?php $backgroundImage = get_sub_field('image');?>
		                  <?php $backgroundPosition = get_sub_field('background_position');?>
		                  <div class="recent-recipe-image background-image-section"
		                    style="background: url('<?php echo $backgroundImage[url];?>') center center no-repeat;background-size:cover;">
		                  </div>
		                <?php endwhile;?>
		              <?php endif;?>
		              <h3><?php the_title();?></h3>
								</div>
								<div class="single-recent-callsfor">
									Calls For:
									<div class="recent-callsfor-ingredient">
										<?php while ( have_rows('product_used_area') ) : the_row();?>
			                <?php if( have_rows('single_product_used') ):?>
			                  <?php while ( have_rows('single_product_used') ) : the_row();?>
			                  	<?php the_sub_field('product_name');?>
			                  <?php endwhile;?>
			                <?php endif;?>
			              <?php endwhile;?>
									</div>
								</div>
	            </div>
	          <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
	          <?php wp_reset_query(); ?>

				</div>
			</section>
			<section class="recipes-section all-recipes-section">
			   <div class="content">
					 <div class="filter-button-container">
						 <div class="recipe-filter-title">
							 BY CATEGORY
						 </div>
						 <div class="recipe-filter-button all-recipe-button active-recipe-filter">
							All
						 </div>
						<!-- Get All The Taxonomies and Load them here using each as title and as filter -->
						<?php $args=array(
  						'public'   => true,
  						'_builtin' => false
						);?>
						<?php $output = 'names';?>
						<?php	$operator = 'and';?>
						<?php $taxonomies=get_taxonomies($args,$output,$operator);?>
						<?php if  ($taxonomies):?>
						  <?php foreach ($taxonomies  as $taxonomy ): $terms = get_terms($taxonomy);?>
						  	<?php foreach ( $terms as $term):?>
									<?php $allLowerTerm = strtolower($term->name);?>
									<?php $allLowerTerm = str_replace(' ', '_', $allLowerTerm);?>
									<div class="recipe-filter-button recipeFilterTaxonomy" data-filter-name="<?php echo $allLowerTerm;?>">
										<?php echo $term->name; ?>
									</div>
								<?php endforeach;?>
							<?php endforeach;?>
						<?php endif;?>

					 </div>
					 <p><input type="text" class="quicksearch" placeholder="SEARCH" /></p>
					 <div class="no-recipe-results noRecipeResults">
						<h2>No recipes match your search.</h2>
					 </div>
					<div class="all-recipes-container">
						<?php
						$args = array(
						'orderby' => 'ASC',
						'post_type' => 'recipes',
						'showposts' => -1,
						);
						$the_query = new WP_Query( $args );?>
						<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php if( have_rows('recipe_image') ):?>
								<?php while ( have_rows('recipe_image') ) : the_row();?>
									<?php $backgroundImage = get_sub_field('image');?>
									<?php $terms = get_the_terms( get_the_ID(), 'recipe-type' );?>
									<div class="single-all-recipe c-width-23 background-image-section lazy <?php if ( $terms && ! is_wp_error( $terms ) ):?><?php foreach ( $terms as $term ):?><?php $allLowerTerm = strtolower($term->name);?><?php $allLowerTerm = str_replace(' ', '_', $allLowerTerm);?><?php echo $allLowerTerm;?> <?php endforeach; ?><?php endif;?>"
										data-bg="url(<?php echo $backgroundImage[url];?>)"
										style="background:center center no-repeat;background-size:cover;">
								<?php endwhile;?>
							<?php endif;?>
								<div class="single-all-main-content">
									<a class="c-block-fill" href="<?php the_permalink();?>"></a>
									<h4><?php the_title();?></h4>
								</div>
							</div>
						<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
					<div class="load-more-recipes-section loadMoreRecipesSection">
						<div class="load-more-recipes-link loadMoreRecipes">
							Load More
						</div>
					</div>
				</div>
			</section>

			<?php get_template_part( 'partials/_find-us-bar' ); ?>

		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
