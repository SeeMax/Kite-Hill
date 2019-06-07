<footer class="footer" role="contentinfo">
	<img class="footer-berry" src="<?php echo get_template_directory_uri(); ?>/img/blueberryhill.png" >
	<div class="content">
		<div class="footer-tile logo-tile c-width-42">
			<img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.svg" >
			<div class="social-search-sub-tile">
				<ul>
					<li>
						<a class="c-block-fill" href="<?php the_field('instagram_link', 'options');?>" target="_blank"></a>
						<i class="fab fa-instagram"></i>
					</li>
					<li>
						<a class="c-block-fill" href="<?php the_field('facebook_link', 'options');?>" target="_blank"></a>
						<i class="fab fa-facebook-f"></i>
					</li>
				</ul>


				<!-- Begin Mailchimp Signup Form -->
				<div id="mc_embed_signup">
					<form action="https://kite-hill.us20.list-manage.com/subscribe/post?u=8312f73d7e99f3850e240441a&amp;id=172737aef9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
							<div class="mc-field-group">
								<input type="email" value="" name="EMAIL" placeholder="Join Our Email List" class="button outlined-button required email" id="mce-EMAIL">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8312f73d7e99f3850e240441a_172737aef9" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
				</div>
				<!--End mc_embed_signup-->
			</div><!-- social-search-sub-tile -->
		</div>
		<div class="footer-tile info-tile c-width-17">
			<?php wp_nav_menu( array('theme_location' => 'our-foods-footer') );?>
		</div>
		<div class="footer-tile info-tile c-width-17">
			<?php wp_nav_menu( array('theme_location' => 'about-us-footer') );?>
		</div>
		<div class="footer-tile info-tile c-width-24">
			<?php wp_nav_menu( array('theme_location' => 'find-us-footer') );?>
		</div>
		<div class="copyright">
			&copy; Kite Hill. All Rights Reserved.
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div><!-- WRAPPER -->
</body>
</html>
