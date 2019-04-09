<?php /* CUSTOM METABOXES */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'additional_info_meta_box_setup' );
add_action( 'load-post-new.php', 'additional_info_meta_box_setup' );

/* Meta box setup function. */
function additional_info_meta_box_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'add_additional_info_meta_box' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'save_additional_info_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function add_additional_info_meta_box() {

$post_types = array('gf_product','gf_events');
foreach($post_types as $post_type):
	add_meta_box(
		'additional_info',			// Unique ID
		esc_html__( 'Additional Info', 'example' ),		// Title
		'additional_info_meta_box',		// Callback function
		$post_type,					// Admin page (or post type)
		'normal',					// Context
		'high'					// Priority
	);
endforeach;	
}


/* Display the post meta box. */
function additional_info_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'additional_info_nonce' ); ?>
	
<div class="my_meta_control">
	<div class="customEditor">
		<textarea class="widefat" type="text" rows="8" cols="20" name="wine_additional_info" id="wine_additional_info"><?php echo esc_attr( get_post_meta( $object->ID, 'wine_additional_info', true ) ); ?></textarea><br />
	</div>
</div>
	
<?php }



/* Save the meta box's post metadata. */
function save_additional_info_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['additional_info_nonce'] ) || !wp_verify_nonce( $_POST['additional_info_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value1 = $_POST['wine_additional_info'];

	/* Get the meta key. */
	$meta_key1 = 'wine_additional_info';

	/* Get the meta value of the custom field key. */
	$meta_value1 = get_post_meta( $post_id, $meta_key1, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value1 && '' == $meta_value1 )
		add_post_meta( $post_id, $meta_key1, $new_meta_value1, true );
							
	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value1 && $new_meta_value1 != $meta_value1 )
		update_post_meta( $post_id, $meta_key1, $new_meta_value1 );								

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value1 && $meta_value1 )
		delete_post_meta( $post_id, $meta_key1, $meta_value1 );
							

}