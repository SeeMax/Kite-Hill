<!DOCTYPE html>

<html  class="<?php echo css_browser_selector() ?>">

	<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PSVS6QF');</script>
<!-- End Google Tag Manager -->
		
<!-- Hotjar Tracking Code for http://www.kite-hill.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1034031,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

		<!--  Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/admin/apple-touch-icon.png">
		
		<?php wp_head(); ?>

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
   		<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '162578181182122'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=162578181182122&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->



	</head>

	<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSVS6QF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<section id="sb-site">

			<header id="main-header" role="main">
				<div class="wrapper clearfix">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-3 col-xs-7">
							<a id="logo" href="<?php bloginfo('url'); ?>"><img src="http://www.kite-hill.com/wp-content/uploads/2017/08/kh_logo.png" /></a>
							<!--<p class="tagline"><?php bloginfo('description'); ?></p>-->
						</div><!--/col-md-4-->

						<div id= "right-nav" class="col-md-7 col-xs-5 text-right">
              <a id ="where-to-buy-btn" href="http://kite-hill.com/coupon/" class="wtbuy-link" style="display:none; margin-right:10px; font-size:18px">Get Coupon</a>
              <a id ="where-to-buy-btn" href="http://kite-hill.com/where-to-buy/" class="wtbuy-link" style="margin-right:10px; font-size:18px" onclick="fbq('track', 'ViewContent');">Where to Buy</a>
						<!--	<article id="newsletter-signup" class="clearfix">
								<?php //echo do_shortcode('[gravityform id="2" name="Newsletter Signup" title="false" description="false" ajax="true"]'); ?> 
							</article>-->
							<nav class="utility-nav">
								<?php wp_nav_menu( array( 'theme_location' => 'social_menu' ) ); ?>		
							</nav>
						
							<?php if(has_nav_menu('main_menu') || has_nav_menu('main_menu')): ?>
								<nav id="mobile-nav">
									<?php if(has_nav_menu('main_menu')): ?>
										<ul id="slidebars-buttons">
											<li>Menu</li>
											<li class="sb-toggle-right">
												<span class="dash"></span>
												<span class="dash"></span>
												<span class="dash"></span>
											</li>
										</ul>
									<?php endif; ?>	
	
									<?php if(has_nav_menu('mobile_menu_left')): ?>
										<ul>
											<li class="sb-toggle-left">
												<span class="dash"></span>
												<span class="dash"></span>
												<span class="dash"></span>
											</li>
										</ul>	
									<?php endif; ?>	
									
								</nav>
							<?php endif; ?>	
						</div>
						
						<div class="col-md-1"></div>
							
					</div><!--/row-->			
				</div><!--END WRAPPER-->
			</header><!--END MAIN-->