<!-- Include Using: -->
<section class="subscribe-bar-section background-image-section"
style="background: url('<?php echo get_template_directory_uri(); ?>/img/subscribe-background.png') center center no-repeat;background-size:cover;">
  <div class="content">
    <div class="words-half c-width-50">
      <h2>Subscribe</h2>
      Sign up for our newsletter
    </div>
    <div class="button-half c-width-50">
      <!-- Begin Mailchimp Signup Form -->
			<div class="signup-form" id="mc_embed_signup">
				<form action="https://kite-hill.us20.list-manage.com/subscribe/post?u=8312f73d7e99f3850e240441a&amp;id=172737aef9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" placeholder="Email Address" class="button outlined-button required email" id="mce-EMAIL">
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
    </div>

    <?php the_content(); ?>
  </div>
</section>
