<?php
// TITLE: rodobot Post Types
// DESCRIPTION: Used to add the main custom post types used by rodobot Marble

add_action( 'init', 'add_as_post_types' );

function add_as_post_types() {

	register_post_type( 'as_products',
		array(
			'labels' => array(
				'name' => __( 'Foods' ),
				'singular_name' => __( 'Food' ),
				'add_new_item' => __( 'Add New Food' ),
				'edit_item' => __( 'Edit Food' ),
				'new_item' => __( 'New Food' ),
				'view_item' => __( 'View Food' ),
				'search_items' => __( 'Search Foods' ),
				'not_found' => __( 'No Foods found' ),
				'not_found_in_trash' => __( 'No Foods found in trash' )
			),
			'public' => true,	
			'menu_icon' => 'dashicons-carrot', // Use for icons (change as needed). See https://developer.wordpress.org/resource/dashicons
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				//'author',
				'thumbnail',
				//'excerpt',
				//'trackbacks',
				'custom-fields',
				//'comments',
				//'revisions',
				'page-attributes'
			),
			'rewrite' => array(
				'slug' => 'food',
			),
			'menu_position' => 20,
		)
	);
	
	register_post_type( 'as_social',
		array(
			'labels' => array(
				'name' => __( 'Social Feed' ),
				'singular_name' => __( 'Post' ),
				'add_new_item' => __( 'Add New Post' ),
				'edit_item' => __( 'Edit Post' ),
				'new_item' => __( 'New Post' ),
				'view_item' => __( 'View Post' ),
				'search_items' => __( 'Search Posts' ),
				'not_found' => __( 'No posts found' ),
				'not_found_in_trash' => __( 'No posts found in trash' )
			),
			'public' => true,	
			'menu_icon' => 'dashicons-share', // Use for icons (change as needed). See https://developer.wordpress.org/resource/dashicons
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				//'author',
				'thumbnail',
				'excerpt',
				//'trackbacks',
				'custom-fields',
				//'comments',
				//'revisions',
				'page-attributes'
			),
			'rewrite' => array(
				'slug' => 'food',
			),
			'menu_position' => 20,
		)
	);
	
} 


// Custom Taxonomy Code  
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {  
	register_taxonomy( 
		'as_product_category', 
		'as_products', 
		array( 
			'hierarchical' => true, 
			'label' => 'Food Category', 
			'query_var' => true, 
			'rewrite' => array('slug'=>'category') )
	);	
	
	register_taxonomy( 
		'as_social_type', 
		'as_social', 
		array( 
			'hierarchical' => true, 
			'label' => 'Social Type', 
			'query_var' => true, 
			'rewrite' => array('slug'=>'type') )
	);		
}