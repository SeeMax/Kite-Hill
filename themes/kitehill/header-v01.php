<!DOCTYPE html>

<html  class="<?php echo css_browser_selector() ?>">

	<head>
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
		
	</head>

	<body <?php body_class(); ?>>
		<section id="sb-site">

			<header id="main-header" role="main">
				<div class="wrapper clearfix">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-3 col-xs-8">
							<a id="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" /></a>
							<!--<p class="tagline"><?php bloginfo('description'); ?></p>-->
						</div><!--/col-md-4-->

						<div class="col-md-7 text-right">
							<article id="newsletter-signup" class="clearfix">
								<?php echo do_shortcode('[gravityform id="2" name="Newsletter Signup" title="false" description="false" ajax="true"]'); ?>
							</article>
							<nav id="utility-nav">
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