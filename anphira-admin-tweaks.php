<?php
/**
 * Plugin Name: Anphira Admin Tweaks
 * Description: Fixes the WP 7 admin link color and removes the Connectors menu item from Settings.
 * Version:     1.0.0
 * Author:      Anphira
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue inline CSS to correct the admin link and button color.
 */
function anphira_admin_link_color(): void {
	$color = '#2271b1';
	$css   = "
		body a,
		#adminmenu a:hover,
		.wrap h1 a {
			color: {$color};
		}
		#adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top,
		.button-primary,
		input[type='submit'].button-primary,
		#adminmenu a:hover, #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus,
		#wpadminbar .ab-top-menu>li.menupop.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojs .ab-top-menu>li.menupop:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus, #wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus .ab-icon:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover, #wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li.hover span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label {
			background-color: {$color} !important;
			color: white !important;
		}
	";
	wp_add_inline_style( 'wp-admin', $css );
}
add_action( 'admin_enqueue_scripts', 'anphira_admin_link_color' );

/**
 * Remove the Connectors submenu item from Settings.
 */
function anphira_remove_connectors_menu(): void {
	remove_submenu_page( 'options-general.php', 'options-connectors.php' );
}
add_action( 'admin_menu', 'anphira_remove_connectors_menu', 999 );
