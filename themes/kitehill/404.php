<?php get_header(); ?>

	<section id="main-content" class="clearfix">	
		<section id="404-error">
			<div class="wrapper centered clearfix">
				<h1><span>Error 404</span> - Not Found</h1>
				<article class="intro-content">
					<p>Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.</p>
					<?php #get_search_form(); ?>
				</article><!--END INTRO CONTENT-->	
			</div><!--END WRAPPER-->	
		</section><!--END INTRO-->
		
		<!--<article class="sub">
			<div class="wrapper clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'sitemap_menu' ) ); ?>
			</div>
		</article>-->	
			
	</section>
	
<?php get_footer(); ?>