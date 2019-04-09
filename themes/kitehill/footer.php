			<footer id="main-footer">
				<div class="wrapper clearfix">	
					<div id="footer-nav-wrapper" class="row">
						<nav id="footer-nav" class="col-md-12">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>	
							<img class="aligncenter" src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-footer-almond.png" />
						</nav><!--END FOOTER NAV-->	
					</div>	
         
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2" style="text-align:center">
              		<nav class="utility-nav">
								<?php wp_nav_menu( array( 'theme_location' => 'social_menu' ) ); ?>		
							</nav>
              <article id="newsletter-signup" class="clearfix">
								<?php echo do_shortcode('[gravityform id="2" name="Newsletter Signup" title="false" description="false" ajax="true"]'); ?> 
							</article>
							
            </div>
          </div>
					<div id="copyright">
						<div class="row">
							<div class="col-md-12">
								<p class="copyright text-center">&copy; <?php date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved. Read our <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a></p>
							</div>
						</div>		
					</div>	
				</div><!--END WRAPPER-->	
			</footer><!--END MAIN-->
			
		</section><!--/slidebars-->	
				
		<?php if(has_nav_menu('main_menu')): ?>
			<div class="sb-slidebar sb-right">
				
				<ul id="utility-links" class="clearfix">
					<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
					<li><a class="sb-close"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-close.png" /></a></li>
				</ul>
					
				<?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>	
				
				<article id="newsletter-signup" class="clearfix">
					<?php echo do_shortcode('[gravityform id="2" name="Newsletter Signup" title="false" description="false" ajax="true"]'); ?>
				</article>
				
				<nav class="utility-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'social_menu' ) ); ?>		
				</nav>
				
			</div>

		<?php endif; ?>	
		
		<?php if(has_nav_menu('mobile_menu_left')): ?>
			<div class="sb-slidebar sb-left">
				<?php wp_nav_menu( array( 'theme_location' => 'mobile_menu_left' ) ); ?>	
			</div>
		<?php endif; ?>		
		
		<?php wp_footer(); ?>
		
	</body>
</html>