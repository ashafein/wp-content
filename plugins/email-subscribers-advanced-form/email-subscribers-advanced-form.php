<?php
/*
 * Plugin Name: Email Subscribers Advanced Form
 * Plugin URI: http://www.storeapps.org/
 * Description: This is a add-on plugin for Email Subscribers plugin. This will extend the plugin Subscribers Form functionality. With this plugin you can provide option to your users to select interested group in the Subscribers Form.
 * Version: 1.3
 * Author: Store Apps
 * Author URI: http://www.storeapps.org/
 * Donate link: http://www.storeapps.org/
 * Requires at least: 3.4
 * Tested up to: 4.4.2
 * Text Domain: email-subscribers-advanced-form
 * Domain Path: /languages/
 * License: GPLv3
 * Copyright (c) 2015, 2016 Store Apps
 */

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'es-af-stater.php');
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'es-af-messages.php');

register_activation_hook( ES_AF_FILE, array( 'es_af_registerhook', 'es_af_activation' ) );
register_deactivation_hook( ES_AF_FILE, array( 'es_af_registerhook', 'es_af_deactivation' ) );
add_action( 'widgets_init', array( 'es_af_registerhook', 'es_af_widget_loading' ) );
add_action( 'admin_menu', array( 'es_af_registerhook', 'es_af_adminmenu' ), 11 );
add_action( 'admin_enqueue_scripts', array( 'es_af_registerhook', 'es_af_load_scripts' ) );
add_shortcode( 'email-subscribers-advanced-form', 'es_af_shortcode' );

function es_af_add_scripts() {
	if (!is_admin()) {
		wp_enqueue_style( 'email-subscribers-advanced-form', ES_AF_URL.'/includes/styles.css');
	}
} 

function es_af_textdomain() {
	load_plugin_textdomain( ES_AF_TDOMAIN , false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'es_af_textdomain' );
add_action( 'wp_enqueue_scripts', 'es_af_add_scripts' );

?>