/* Author: Angelsmith, Inc.
*/

var $j = jQuery.noConflict();
	
$j(document).ready(function() {
	
	$j.slidebars();
	
	$j("#social-feed").owlCarousel({
		pagination: false,
		autoPlay: 5000,
		items : 3,
		itemsDesktop : [1199,5],
		itemsDesktopSmall : [979,5],
		itemsTablet : [768,2],
		itemsMobile : [479,1],
		//navigation : true,
		//autoHeight : true,
	});

});