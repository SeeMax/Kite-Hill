<footer class="footer" role="contentinfo">
	<img class="footer-berry" src="<?php echo get_template_directory_uri(); ?>/img/blueberryhill.png" >
	<div class="content">
		<div class="footer-tile logo-tile c-width-25">
			<img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.svg" >
		</div>
		<div class="footer-tile info-tile c-width-20">
			<ul>
				<li>
					<a class="c-block-fill" href="/"></a>
					Home
				</li>
				<li>
					<a class="c-block-fill" href="/our-food"></a>
					Our Foods
				</li>
				<li>
					<a class="c-block-fill" href="'/where-to-buy'"></a>
					<?php the_sub_field('button_text');?>
				</li>
			</ul>
		</div>
		<div class="footer-tile info-tile c-width-20">
			<ul>
				<li>
					<a class="c-block-fill" href="/faq"></a>
					FAQ
				</li>
				<li>
					<a class="c-block-fill" href="/contact"></a>
					Contact Us
				</li>
				<li>
					<a class="c-block-fill" href="/privacy-policy"></a>
					Privacy Policy
				</li>
			</ul>
		</div>
		<div class="footer-tile tile-holder c-width-10">
			<!-- Holder -->
		</div>
		<div class="footer-tile social-tile c-width-25">
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
			<div style="display:none" id="mc_embed_signup">
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
		</div>
		<div class="copyright">
			&copy; Copyright 2019 Kite Hill Foods
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div><!-- WRAPPER -->
</body>
</html>
