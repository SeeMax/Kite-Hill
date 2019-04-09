<?php
/*
Template Name: Serialize
*/
?>
<?php get_header(); ?>

<?php

$posts = get_posts('post_type=location&posts_per_page=-1');
foreach($posts as $post):
	
	$data = array( 
		'address' => get_post_meta($post->ID,'address',TRUE).', USA',
		'longitude' => get_post_meta($post->ID,'longitude',TRUE),
		'latitude' => get_post_meta($post->ID,'latitude',TRUE),
		'post_id' => (string)$post->ID,
	);

	/*$serial_data = maybe_serialize($data);
	update_post_meta($post->ID,'slm_meta',$serial_data);//*/
	
	update_post_meta($post->ID,'slm_meta',$data);//*/
	
	echo '<pre>';
	echo $post->post_title.' '.get_post_meta($post->ID,'slm_meta',TRUE);
	echo '</pre>';
	//*/
		
	/*
	//$slm_meta = get_post_meta($post->ID,'slm_meta',TRUE);
	//$slm_meta_array = unserialize($slm_meta);
	
	echo '
		<pre>';
	var_dump($serial_data);
	echo '
		</pre>'; //*/ 

endforeach;
	
?>
	
<?php get_footer(); ?>