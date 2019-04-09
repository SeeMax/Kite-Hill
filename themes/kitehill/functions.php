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
include (STYLESHEETPATH . '/functions/instagram.php');

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
	$output .= '<p>'.truncateHtml($post->post_content,144).'</p>'."\n";
	$output .= '</div>'."\n";
	$output .= '</article><!--END POST-->'."\n";

endforeach;
$output .= '</div>'."\n";
$output .= '<div class="col-md-2"></div>'."\n";
$output .= '</section>'."\n";

return $output;
}
add_shortcode('social_feed','addSocialFeed');






function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Recipes', 'Post Type General Name', 'kitehill' ),
		'singular_name'       => _x( 'Recipe', 'Post Type Singular Name', 'kitehill' ),
		'menu_name'           => __( 'Recipes', 'kitehill' ),
		'parent_item_colon'   => __( 'Parent Recipe', 'kitehill' ),
		'all_items'           => __( 'All Recipes', 'kitehill' ),
		'view_item'           => __( 'View Recipe', 'kitehill' ),
		'add_new_item'        => __( 'Add New Recipe', 'kitehill' ),
		'add_new'             => __( 'Add New', 'kitehill' ),
		'edit_item'           => __( 'Edit Recipe', 'kitehill' ),
		'update_item'         => __( 'Update Recipe', 'kitehill' ),
		'search_items'        => __( 'Search Recipe', 'kitehill' ),
		'not_found'           => __( 'Not Found', 'kitehill' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'kitehill' ),
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'recipes', 'kitehill' ),
		'description'         => __( 'recipe description', 'kitehill' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
      'menu_icon'           => 'dashicons-groups',
	);

	// Registering your Custom Post Type
	register_post_type( 'recipes', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );


// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Custom Meta Box', // $title
        'show_custom_meta_box', // $callback
        'recipes', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');


// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
    array(
        'label'=> 'Brief Description',
        'desc'  => 'Short Description',
        'id'    => $prefix.'desc',
        'type'  => 'textarea'
    ),
	array(
		'label'=> 'Photo/Recipe Credit',
		'desc'  => 'Enter credit here',
		'id'    => $prefix.'credit',
		'type'  => 'text'
		),
		array(
				'label'=> 'Calls For',
				'desc'  => 'What the recipe calls for',
				'id'    => $prefix.'callfor',
				'type'  => 'text'
		),
      array(
        'label'=> 'Servings',
        'desc'  => 'Servings',
        'id'    => $prefix.'servings',
        'type'  => 'text'
    ),
      array(
        'label'=> 'Time',
        'desc'  => 'Time',
        'id'    => $prefix.'time',
        'type'  => 'text'
    ),
    array(
        'label'=> 'Ingredients',
        'desc'  => 'Add ingredients here',
        'id'    => $prefix.'ingredients',
        'type'  => 'textarea'
    ),
      array(
        'label'=> 'Steps',
        'desc'  => 'Add Steps here',
        'id'    => $prefix.'steps',
        'type'  => 'textarea'
    ),
    array(
        'label'=> 'Appetizers',
        'desc'  => 'Check if appetizers recipe',
        'id'    => $prefix.'checkbox_appetizers',
        'type'  => 'checkbox'
    ),
		array(
				'label'=> 'Entrees',
				'desc'  => 'Check if entrees recipe',
				'id'    => $prefix.'checkbox_entrees',
				'type'  => 'checkbox'
		),
		array(
				'label'=> 'Breakfast',
				'desc'  => 'Check if breakfast recipe',
				'id'    => $prefix.'checkbox_breakfast',
				'type'  => 'checkbox'
		),
		array(
				'label'=> 'Sides',
				'desc'  => 'Check if sides recipe',
				'id'    => $prefix.'checkbox_sides',
				'type'  => 'checkbox'
		),
		array(
				'label'=> 'Beverages',
				'desc'  => 'Check if beverage recipe',
				'id'    => $prefix.'checkbox_beverages',
				'type'  => 'checkbox'
		),
		array(
				'label'=> 'Snacks',
				'desc'  => 'Check if Snack',
				'id'    => $prefix.'checkbox_snacks',
				'type'  => 'checkbox'
		),
  		array(
				'label'=> 'Desserts',
				'desc'  => 'Check if Dessert',
				'id'    => $prefix.'checkbox_desserts',
				'type'  => 'checkbox'
		),
    array(
        'label'=> 'Kite-Hill Product',
        'desc'  => 'Pick Kite-Hill Product',
        'id'    => $prefix.'select_food',
        'type'  => 'select',
        'options' => array (
            'one' => array (
                'label' => 'European Yogurt',
                'value' => 'europeanyogurt'
            ),
            'two' => array (
                'label' => 'Greek Yogurt',
                'value' => 'greekyogurt'
            ),
						'three' => array (
								'label' => 'Artisanal Cheese',
								'value' => 'artisanalcheese'
						),
						'four' => array (
								'label' => 'Cream Cheese',
								'value' => 'chreamcheese'
						),
						'five' => array (
								'label' => 'Pastas',
								'value' => 'pastas'
						),




        )
    ),
		array(
				'label'=> 'Kite-Hill Second Product ',
				'desc'  => 'Pick Kite-Hill Second Product',
				'id'    => $prefix.'select_food2',
				'type'  => 'select',
				'options' => array (
						'one' => array (
								'label' => 'European Yogurt',
								'value' => 'europeanyogurt'
						),
						'two' => array (
								'label' => 'Greek Yogurt',
								'value' => 'greekyogurt'
						),
						'three' => array (
								'label' => 'Artisanal Cheese',
								'value' => 'artisanalcheese'
						),
						'four' => array (
								'label' => 'Cream Cheese',
								'value' => 'chreamcheese'
						),
						'five' => array (
								'label' => 'Pastas',
								'value' => 'pastas'
						),




				)
		)
);


// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                  // text
                    case 'text':
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                          <br /><span class="description">'.$field['desc'].'</span>';
                    break;
                    // textarea
                    case 'textarea':
                        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
                            <br /><span class="description">'.$field['desc'].'</span>';
                    break;
                    // checkbox
                    case 'checkbox':
                        echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
                            <label for="'.$field['id'].'">'.$field['desc'].'</label>';
                    break;

                    // select
                    case 'select':
                        echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
                        foreach ($field['options'] as $option) {
                            echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
                        }
                        echo '</select><br /><span class="description">'.$field['desc'].'</span>';
                    break;


                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}


// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;

    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }

    // loop through fields and save the data
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_custom_meta');
add_theme_support( 'post-thumbnails' );




function misha_filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'], // ASC или DESC
     'post_type' => 'recipes'
	);
	$args2 = array(
 	 'orderby' => 'date', // we will sort posts by date
 	 'order'	=> $_POST['date'], // ASC или DESC
 		'post_type' => 'recipes'
  );

if($_POST['foodtype']=="all"){
	$compare ="!=";
}
else{
	$compare="=";
}
if($_POST['foodtype2']=="all"){
	$compare2 ="!=";
}
else{
	$compare2="=";
}

	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['breakfast'] ) || isset($_POST['snacks']) || isset( $_POST['appetizers'] ) || isset($_POST['entrees']) || isset( $_POST['sides'] ) || isset($_POST['beverages']) || isset($_POST['desserts'])  == 'on' ){
		$args['meta_query'] = array( 'relation'=>'OR' ); // AND means that all conditions of meta_query should be true

}

	// if post thumbnail is set
	if( isset( $_POST['breakfast'] ) && $_POST['breakfast'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
			 array(
			'key' => 'custom_checkbox_breakfast',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'),

			array(

				'key' => 'custom_select_food',
				'value' => $_POST['foodtype'],
				'compare' => $compare,
				'post_type' => 'recipes'),

		);

 	// if post thumbnail is set
	if( isset( $_POST['snacks'] ) && $_POST['snacks'] == 'on' )
		$args['meta_query'][] =	array(
			 'relation' => 'AND',
			 array(
			'key' => 'custom_checkbox_snacks',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'
),
		array(

			'key' => 'custom_select_food',
			'value' => $_POST['foodtype'],
			'compare' => $compare,
			'post_type' => 'recipes'),

		);

	// if post thumbnail is set
	if( isset( $_POST['appetizers'] ) && $_POST['appetizers'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
		array(
			'key' => 'custom_checkbox_appetizers',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'),
			array(

				'key' => 'custom_select_food',
				'value' => $_POST['foodtype'],
				'compare' => $compare,
				'post_type' => 'recipes'),


		);
	 	// if post thumbnail is set
	if( isset( $_POST['entrees'] ) && $_POST['entrees'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
			 array(
			'key' => 'custom_checkbox_entrees',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'),
			array(

				'key' => 'custom_select_food',
				'value' => $_POST['foodtype'],
				'compare' => $compare,
				'post_type' => 'recipes'),

		);
	 	// if post thumbnail is set
	if( isset( $_POST['sides'] ) && $_POST['sides'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
			  array(
			'key' => 'custom_checkbox_sides',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'),
			array(

				'key' => 'custom_select_food',
				'value' => $_POST['foodtype'],
				'compare' => $compare,
				'post_type' => 'recipes'),

		);
	 	// if post thumbnail is set
	if( isset( $_POST['beverages'] ) && $_POST['beverages'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
			 array(
			'key' => 'custom_checkbox_beverages',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'),
			array(

				'key' => 'custom_select_food',
				'value' => $_POST['foodtype'],
				'compare' => $compare,
				'post_type' => 'recipes'),

		);

  	if( isset( $_POST['desserts'] ) && $_POST['desserts'] == 'on' )
		$args['meta_query'][] = array(
			 'relation' => 'AND',
			 array(
			'key' => 'custom_checkbox_desserts',
			'compare' => 'EXISTS',
      'post_type' => 'recipes'
		),
		array(

			'key' => 'custom_select_food',
			'value' => $_POST['foodtype'],
			'compare' => $compare,
			'post_type' => 'recipes'),



	);






  $query = new WP_Query( $args);





  $count = 0;
	$count2=1;
   echo "<div class='row padding-ten' style='margin-top:50px'>";
	if( $query->have_posts()) :
		while( $query->have_posts() ): $query->the_post();



if ($count<3){
    if ( has_post_thumbnail() ) {
			 $thumbsm =get_the_post_thumbnail_url();
		}

   echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12 recipe-square' style='margin:0px;'>";
    $permalinksm = get_the_permalink();
		echo "<div class='container recipe-img' style='width:100%; text-align:center; margin:0 auto; background:url(".$thumbsm."); background-size:cover; background-repeat:no-repeat;'>";
		// dkddi - 041118 removed background linear gradient

   echo "<div class='overlay1'>";
	  $titlesm = get_the_title();
	$callfor = get_post_custom_values('custom_callfor');


	 echo "<h4 class='recipe-title'><a style='color:rgb(9, 181, 201); font-size:35px; font-weight:bold;' href='".$permalinksm."'>SEE THE RECIPE</a></h4>";
	 echo "</div>";
   echo "</div>";
	 echo  " <div style='height:10px; background:rgb(9, 181, 201); margin-top:5px; margin-bottom:5px;'>  </div>";
	 echo "<h3 style='color:rgb(9, 181, 201);''>".$titlesm."</h3>";
	 echo " <p class='calls-for'><strong>Calls for:</strong></p>";
	 echo wpautop($callfor[0]);
	 echo "</div>";

  $count++;
if ($count==3){
 echo "</div>";
 echo "<div class='row' style='background:#fff;padding-bottom:30px;'>";
 echo "<h1 style='margin-top:30px; text-align:center;'>More Recipes</h1>";
 echo "</div>";
}

}
 else{
	 if ( has_post_thumbnail() ) {
		 $thumbsm =get_the_post_thumbnail_url();
	}
   if(((($count2+2) % 3)==0)){
		 echo "<div class='row padding-ten' style='background:#fff;padding-top:20px;'>";
	 }

    echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12 recipe-square'>";
    $permalinksm = get_the_permalink();
	  echo "<div class='container recipe-img' style='width:100%; text-align:center; margin:0 auto; background:url(".$thumbsm."); background-size:cover; background-repeat:no-repeat;'>";
		// dkddi - 041118 removed background linear gradient


   echo "<div class='overlay1'>";
	  $titlesm = get_the_title();

	 echo "<h4 class='recipe-title'><a style='color:rgb(9, 181, 201); font-size:35px; font-weight:bold;' href='".$permalinksm."'>".$titlesm."</a></h4>";
	 echo "</div>";
   echo "</div>";
	 echo "</div>";

if ((($count2 % 3)==0)){
	echo "</div>";
}
$count2++;



}

		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

	die();
}


add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

$post_id ="recipes";
function add_featured_image_display_settings( $content, $post_id ) {
	$field_id    = 'show_featured_image';
	$field_value = esc_attr( get_post_meta( $post_id, $field_id, true ) );
	$field_text  = esc_html__( 'Show image.', 'generatewp' );
	$field_state = checked( $field_value, 1, false);

	$field_label = sprintf(
	    '<p><label for="%1$s"><input type="checkbox" name="%1$s" id="%1$s" value="%2$s" %3$s> %4$s</label></p>',
	    $field_id, $field_value, $field_state, $field_text
	);

	return $content .= $field_label;
}

function save_featured_image_display_settings( $post_ID, $post, $update ) {
	$field_id    = 'show_featured_image';
	$field_value = isset( $_REQUEST[ $field_id ] ) ? 1 : 0;

	update_post_meta( $post_ID, $field_id, $field_value );
}
add_action( 'save_post', 'save_featured_image_display_settings', 10, 3 );









?>
