<?php
// TITLE: ADD ADMIN MENU SEPARATOR
// DESCRIPTION: This function allows us to add a menu divider to the admin menu
// SOURCE: http://wordpress.stackexchange.com/questions/2666/add-a-separator-to-the-admin-menu


function add_admin_menu_separator($position) {
	global $menu;
	$index = 0;
	foreach($menu as $offset => $section) {
		if (substr($section[2],0,9)=='separator')
			$index++;
		if ($offset>=$position) {
			$menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
			break;
		}
	}
	ksort( $menu );
}