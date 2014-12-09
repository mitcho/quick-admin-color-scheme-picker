<?php
/*
Plugin Name: Quick admin color scheme picker
Author: mitcho (Michael 芳貴 Erlewine)
Description: Lets you quickly switch between admin color schemes from the "howdy menu." Happy Birthday Sara Cannon!
Author URI: http://mitcho.com/
Donate link: http://tinyurl.com/donatetomitcho
License: GPLv2 or later
Version: 0.7
*/

add_action('admin_bar_menu', 'qacsp_menu', 11);

function qacsp_menu( $wp_admin_bar ) {
	global $wpdb;
	if ( !is_admin() )
		return;

	$user = wp_get_current_user();
	if ( $user->has_prop( $wpdb->prefix . 'admin_color' ) ) {
		update_user_meta( $user->ID, 'admin_color', get_user_option( 'admin_color' ) );
		delete_user_option( $user->ID, 'admin_color' );
	}

	foreach ( _qacsp_get_links( $user->ID ) as $linkdata ) {
		$wp_admin_bar->add_node(array(
			'id' => 'admin-color-' . $linkdata['color'],
			'title' => $linkdata['title'],
			'href' => $linkdata['href'],
			'parent' => 'my-account',
			'secondary' => true,
			'meta' => array( 'class' => 'qacsp-link' )
		));
	}
}

function _qacsp_get_links( $user_id = 0 ) {
	if ( !is_admin() )
		return false;

	global $_wp_admin_css_colors;

	$current_color = get_user_option('admin_color', $user_id);
	if ( empty($current_color) )
		$current_color = 'fresh';

	$colorlinks = array();

	foreach ( $_wp_admin_css_colors as $color => $color_info ) {
		// add checkmark for current color
		$title = ($color == $current_color) ? '✔' : '&nbsp;';
		$title = '<span style="min-width: 10px; display: inline-block;">' . $title . '</span> ';

		// print colors
		foreach ( $color_info->colors as $html_color ) {
			$title .= '<span style="width: 10px; height: 10px; min-width:10px; padding: 0px; line-height: 10px; display: inline-block; background-color: ' . $html_color . '" title="' . $color . ' ">&nbsp;</span>';
		}
		
		$title .= '<span style="width: 6px; display: inline-block;">&nbsp;</span>';
		
		$title .= $color_info->name . '</a>';
		$colorlinks[] = array(
			'color' => $color,
			'title' => $title,
			'href' => add_query_arg( 'admin_color', $color )
		);
	}

	return $colorlinks;
}

add_action('admin_init', 'qacsp_switch');
function qacsp_switch() {
	if ( !isset( $_GET['admin_color'] ) )
		return;

	if ( ! $user = wp_get_current_user() )
		die('-1');

	update_user_meta( $user->ID, 'admin_color', sanitize_text_field( $_GET['admin_color'] ) );
	wp_safe_redirect( remove_query_arg( 'admin_color' ) );
}
