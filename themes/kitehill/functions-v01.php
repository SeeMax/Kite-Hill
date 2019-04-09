<?php
// LOAD ALL SCRIPTS AND CLASSES
if( !is_admin()) {
	$blogPath = get_bloginfo('stylesheet_directory');
	
	//--Scripts	
	wp_register_script('carousel', "$blogPath/js/owl-carousel/owl.carousel.min.js", array('jquery'), false, true); 
	wp_register_script('add-this', "//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51eeb3fb315a50a0", array('jquery'), false, true);
	wp_register_script('bootstrap', "$blogPath/js/bootstrap.min.js", array('jquery'), false, true);
	wp_register_script('slidebars', "$blogPath/js/slidebars.js", array('jquery'), false, true);
	wp_register_script('script', "$blogPath/js/script.js", array('jquery','slidebars','carousel'));
	
	wp_enqueue_script('carousel');
	wp_enqueue_script('add-this');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('slidebars');
	wp_enqueue_script('script');
	
	//--Styles
	wp_register_style('owl', "$blogPath/js/owl-carousel/owl.theme.css");
	wp_register_style('carousel', "$blogPath/js/owl-carousel/owl.carousel.css");
	wp_register_style('bootsrap-theme', "$blogPath/styles/bootstrap-theme.min.css");	
	wp_register_style('bootstrap', "$blogPath/styles/bootstrap.min.css");
	wp_register_style('font-awesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
	wp_register_style('slidebars', "$blogPath/styles/slidebars.css");
	wp_register_style('fonts', "$blogPath/styles/MyFontsWebfontsKit.css");
	
	wp_enqueue_style('owl');
	wp_enqueue_style('carousel');	
	wp_enqueue_style('bootsrap-theme');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('slidebars');
	wp_enqueue_style('fonts');
}

// LOAD ALL EXTERNAL FUNCTIONS
// ************************************************************************************************
// TITLE: INSTAGRAM
// DESCRIPTION: Used to connect with the Instagram API.
//include (STYLESHEETPATH . '/functions/instagram.php');
	
// TITLE: Slideshow Post Type
// DESCRIPTION: Used to create a slideshow post type that we use for slide shows.
include (STYLESHEETPATH . '/functions/custom_post_types.php');

// TITLE: Admin Menu Separator
// DESCRIPTION: Adds menu seperator for custom post types.
include (STYLESHEETPATH . '/functions/add_admin_menu_separator.php');

// TITLE: Breadcrumbs
// DESCRIPTION: Used to create breadcrumbs.
//php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
include (STYLESHEETPATH . '/functions/breadcrumbs.php');

//INCLUDE METABOX TOOLS
//http://www.farinspace.com/multiple-wordpress-wysiwyg-visual-editors/
include (STYLESHEETPATH . '/functions/wpalchemy/MetaBox.php');


// TWEAKS AND MODS
// ************************************************************************************************


// Change login logo to be custom logo with link to main blog url
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/admin/logo-login.png) !important; background-size:247px 86px !important; height:86px !important; width:247px !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');
function my_custom_login_url() {
	return get_bloginfo('url');;
}
add_action( 'login_headerurl', 'my_custom_login_url' );


// Remove version numbers from js and css declarations
add_filter( 'script_loader_src', 'remove_src_version' );
add_filter( 'style_loader_src', 'remove_src_version' );
function remove_src_version ( $src ) {
	global $wp_version;
	$version_str = '?ver='.$wp_version;
	$version_str_offset = strlen( $src ) - strlen( $version_str );
	if( substr( $src, $version_str_offset ) == $version_str )
		return substr( $src, 0, $version_str_offset );
	else
		return $src;
}

//Function to get the featured image url
function get_thumbnail_src($id) {
    
    if (has_post_thumbnail($id, $size)) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size);
		$src = $large_image_url[0];
        return $src;
    } else {
        return null;
    }
}

//Function to get the featured image url
function get_facebook_image($id) {
    
    if (has_post_thumbnail($id)) {
		$thumbID = get_post_thumbnail_id($id);
		$facebook_image_url = wp_get_attachment_image_src( $thumbID, 'facebook');
		$fbSrc = $facebook_image_url[0];
        return $fbSrc;
    } else {
        return null;
    }
}

// ADD WYSIWYG TO CUSTOM META BOXES
// ************************************************************************************************

// custom constant (opposite of TEMPLATEPATH)
define('_TEMPLATEURL',WP_CONTENT_URL . '/themes/' . basename(TEMPLATEPATH));
 
// custom css for our meta boxes
if (is_admin()) wp_enqueue_style('custom_meta_css',_TEMPLATEURL . '/custom/meta.css');
 
// create the meta box
$custom_metabox = new WPAlchemy_MetaBox(array
(
    'id' => '_custom_meta',
    'title' => 'My Custom Meta',
    'template' => TEMPLATEPATH . '/custom/meta.php'
));
 
// important: note the priority of 99, the js needs to be placed after tinymce loads
add_action('admin_print_footer_scripts','my_admin_print_footer_scripts',99);
function my_admin_print_footer_scripts()
{
    ?><script type="text/javascript">/* <![CDATA[ */
        jQuery(function($)
        {
            var i=1;
            $('.customEditor textarea').each(function(e)
            {
                var id = $(this).attr('id');
 
                if (!id)
                {
                    id = 'customEditor-' + i++;
                    $(this).attr('id',id);
                }
 
                tinyMCE.execCommand('mceAddControl', false, id);
                 
            });
        });
    /* ]]> */</script><?php
}

//Put Private posts/pages in parent dropdown
//https://core.trac.wordpress.org/ticket/8592#comment:129
function admin_private_parent_metabox($output){
	global $post;

	$args = array(
		'post_type'			=> $post->post_type,
		'exclude_tree'		=> $post->ID,
		'selected'			=> $post->post_parent,
		'name'				=> 'parent_id',
		'show_option_none'	=> __('(no parent)'),
		'sort_column'		=> 'menu_order, post_title',
		'echo'				=> 0,
		'post_status'		=> array('publish', 'private'),
	);

	$defaults = array(
		'depth'					=> 0,
		'child_of'				=> 0,
		'selected'				=> 0,
		'echo'					=> 1,
		'name'					=> 'page_id',
		'id'					=> '',
		'show_option_none'		=> '',
		'show_option_no_change'	=> '',
		'option_none_value'		=> '',
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	$pages = get_pages($r);
	$name = esc_attr($name);
	// Back-compat with old system where both id and name were based on $name argument
	if (empty($id))
	{
		$id = $name;
	}

	if (!empty($pages))
	{
		$output = "<select name=\"$name\" id=\"$id\">\n";

		if ($show_option_no_change)
		{
			$output .= "\t<option value=\"-1\">$show_option_no_change</option>";
		}
		if ($show_option_none)
		{
			$output .= "\t<option value=\"" . esc_attr($option_none_value) . "\">$show_option_none</option>\n";
		}
		$output .= walk_page_dropdown_tree($pages, $depth, $r);
		$output .= "</select>\n";
	}

	return $output;
}
add_filter('wp_dropdown_pages', 'admin_private_parent_metabox');

// WORDPRESS DECLARATIONS 
// ************************************************************************************************

// Add Editor styles to Visual Editor
add_editor_style('/admin/custom-editor-style.css');


// Register menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main_menu' => 'Main Menu',
			'footer_menu' => 'Footer Menu',
			'social_menu' => 'Social Menu',
			'blog_menu' => 'Blog Menu',
			'mobile_menu_left' => 'Mobile Menu Left',
			'mobile_menu_right' => 'Mobile Menu Right',
		)
	);
}

// Sidebars
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar',
		'description' => 'These widgets will appear in the sidebar.',
		'before_widget' => '<article class="widget">',
		'after_widget' => '</article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}	


// Add Thumbnail Sizes
if ( function_exists( 'add_theme_support' ) ) { 
	add_image_size( 'slideshow', 960, 400, true ); 
	add_image_size( 'blog', 200, 200, true ); 
}

//SET FACEBOOK IMAGE
//http://www.wpbeginner.com/wp-themes/how-to-avoid-no-thumbnail-issue-while-sharing-post-on-facebook/
function insert_wine_image_src_rel_in_head() {
	global $post;
	if ( get_post_type($post->ID)=='gf_wines' ){
		if( !MultiPostThumbnails::has_post_thumbnail('gf_wines', 'label-image', $post->ID )) { //the post does not have featured image, use a default image
			$default_image=get_bloginfo('stylesheet_directory')."/images/facebook-default.jpg"; //replace this with a default image on your server or an image in your media library
			echo '<meta property="og:image" content="' . $default_image . '"/>';
			echo '<meta property="og:title" content="'.get_the_title($post->ID).'"/>';
			echo '<meta property="og:url" content="'.get_permalink($post->ID).'"/>';
			echo '<meta property="og:description" content="'.strip_tags($post->post_content).'"/>';
		}
		else{
			echo '<meta property="og:image" content="' . MultiPostThumbnails::get_post_thumbnail_url('gf_wines', "label-image", $post->ID, "facebook") . '"/>';
			echo '<meta property="og:title" content="'.get_the_title($post->ID).'"/>';
			echo '<meta property="og:url" content="'.get_permalink($post->ID).'"/>';
			echo '<meta property="og:description" content="'.strip_tags($post->post_content).'"/>';
		}
	}
}
add_action( 'wp_head', 'insert_wine_image_src_rel_in_head', 5 );


//Get Time Since
function humanTiming($time){

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}


// SHORTCODES
// ************************************************************************************************

function addButton($atts, $content = null) {
extract(shortcode_atts(array(

), $atts));
$output ='<div class="button">'."\n";
$output .= do_shortcode($content)."\n";
$output .= '</div>'."\n";
return $output;
}
add_shortcode('button','addButton');


function addSocialIcons($atts, $content = null) {
extract(shortcode_atts(array(

), $atts));
$output ='<ul class="share addthis_toolbox addthis_default_style addthis_32x32_style">
								<li>Share This</li>
								<li><a class="addthis_button_facebook"></a></li>
								<li><a class="addthis_button_twitter"></a></li>
								<li><a class="addthis_button_pinterest_share"></a></li>
								<li><a class="addthis_button_google_plusone_share"></a></li>
							</ul><!--END SHARE-->'."\n";
return $output;
}
add_shortcode('social-icons','addSocialIcons');


function addTweetThis($atts, $content = null) {
extract(shortcode_atts(array(

), $atts));
$output ='<ul class="share tweet-this addthis_toolbox addthis_default_style addthis_32x32_style">
								<li><a class="addthis_button_twitter"></a> Tweet This</li>
							</ul><!--END SHARE-->'."\n";
return $output;
}
add_shortcode('tweet-this','addTweetThis');



function addSocialFeed($atts, $content = null) {
extract(shortcode_atts(array(
), $atts));

$output = '<section id="social-feed" class="row posts">'."\n";
$output .= '<div class="col-md-2"></div>'."\n";
$output .= '<div class="col-md-8"></div>'."\n";
$posts = get_posts('post_type=as_social&posts_per_page=10');
foreach($posts as $post):

	$output .= '<article class="social-post">'."\n";
	if($post->post_excerpt != ''):
		$output .= '<div class="col-md-6 post-image">'."\n";
		$output .= '<img src="'.$post->post_excerpt.'" />'."\n";
		$output .= '</div>'."\n";
		$output .= '<div class="col-md-6">'."\n";
	else:
		$output .='<div class="col-md-12">'."\n";
	endif;		
	if(strstr($post->post_title,'Twitter')):
		$output .= '<p class="date"><i class="fa fa-twitter"></i>'.humanTiming(strtotime($post->post_date)).'</p>'."\n";
	endif;	
	if(strstr($post->post_title,'Instagram')):
		$output .= '<p class="date"><i class="fa fa-instagram"></i>'.humanTiming(strtotime($post->post_date)).'</p>'."\n";
	endif;
	$output .= '<p>'.$post->post_content.'</p>'."\n";
	$output .= '</div>'."\n";	
	$output .= '</article><!--END POST-->'."\n";
	
endforeach;
$output .= '</div>'."\n";
$output .= '<div class="col-md-2"></div>'."\n";
$output .= '</section>'."\n";

return $output;
}
add_shortcode('social_feed','addSocialFeed');	
?>