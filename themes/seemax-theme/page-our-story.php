<?php /* Template Name: Our Story */ get_header(); ?>
	<main class="default-page">
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
			<section class="story-open">
			    <div class="content">
					<?php if( have_rows('story_open') ):?>
						<?php while ( have_rows('story_open') ) : the_row();?>
							<div class="story-segment">
								<div class="image-half c-width-50">
									<h2><?php the_sub_field('title');?></h2>
								</div>
								<div class="words-half c-width-50">
									<h3><?php the_sub_field('body');?></h3>
								</div>
							</div>
						<?php endwhile;?>
					<?php endif;?>
				</div>
			</section>
			<section class="story-container segmentTrigger">
			    <div class="content">
			    <?php if( have_rows('story_segment') ):?>
			      <?php $i = 1; while ( have_rows('story_segment') ) : the_row();?>
			        <?php if( have_rows('story_contents') ):?>
			          <?php while ( have_rows('story_contents') ) : the_row();?>
			            <div class="story-segment segmentActor">
										<svg class="story-line" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2 100" preserveAspectRatio='none'>
										<style type="text/css">
											.storyLineFill{fill:#C8C8C8;stroke:#FFFFFF;stroke-width:0.1535;stroke-miterlimit:10;}
										</style>
										<rect class="storyLineFill" x="0" y="0" width="2" height="100"/>
										</svg>
			              <div class="image-half c-width-50">
			                <?php $image = get_sub_field('image');?>
											<div class="segment-date">
												<span class="date-number"><?php the_sub_field('date');?></span>
												<div class="date-dot"></div>
											</div>
			                <img src='<?php echo $image[url];?>'>
			              </div>
			              <div class="words-half c-width-50">
											<div class="segment-count">no.<?php echo $i; ?></div>
			                <h2><?php the_sub_field('title');?></h2>
			                <p><?php the_sub_field('body');?></p>
			              </div>
			            </div>

			          <?php endwhile;?>
			  			<?php endif;?>

			      <?php $i++; endwhile;?>
					<?php endif;?>

					<?php if( have_rows('story_end') ):?>
						<?php while ( have_rows('story_end') ) : the_row();?>
							<div class="story-segment story-segment-end segmentActor">
								<div class="image-half c-width-50">
									<?php $image = get_sub_field('image');?>
									<div class="segment-date">
										<div class="date-dot"></div>
									</div>
									<img src='<?php echo $image[url];?>'>
								</div>
								<div class="words-half c-width-50">
									<h2><?php the_sub_field('title');?></h2>
									<h3><?php the_sub_field('body');?></h3>
								</div>
							</div>
						<?php endwhile;?>
					<?php endif;?>
			  </div>
			</section>
			<?php get_template_part( 'partials/_find-us-bar' ); ?>

		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
