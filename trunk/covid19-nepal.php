<?php
/*
Plugin Name: Covid-19 Nepal
Plugin URI: https://wordpress.org/plugins/covid-19-nepal
Description: The plugin is simple plugin that is targeted to the websites in Nepali languages to display the statistics of COVID-19 cases in Nepal and the world.  
Version: 1.0.0
Author: Padam Shankhadev
Author URI: https://www.padamshankhadev.com
*/

/* Prevent Direct access */
if ( !defined( 'DB_NAME' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

/* Define BaseName */
if ( !defined( 'COVID19NEPAL_BASENAME' ) )
	define( 'COVID19NEPAL_BASENAME', plugin_basename( __FILE__ ) );

/* Define plugin url */
if( !defined('COVID19NEPAL_PLUGIN_URL' ))
	define('COVID19NEPAL_PLUGIN_URL', plugin_dir_url(__FILE__));

/* Define plugin path */
if( !defined('COVID19NEPAL_PLUGIN_DIR' ))
	define('COVID19NEPAL_PLUGIN_DIR', plugin_dir_path(__FILE__));

/* Plugin version */
define('COVID19NEPAL', '1.0.0');

/* Check if we're running compatible software */
if ( version_compare( PHP_VERSION, '5.5', '<' ) && version_compare( WP_VERSION, '4.0', '<' ) ) {
	if ( is_admin() ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		deactivate_plugins( __FILE__ );
		wp_die( __( 'Covid-19 nepal plugin requires WordPress 4.0 and PHP 5.5 or greater. The plugin has now disabled itself' ) );
	}
}


/* Let's load up our plugin */

if( is_admin() ) :

	add_action( 'plugins_loaded', function() {
        require_once( COVID19NEPAL_PLUGIN_DIR . 'class.covid19.admin.php' );  
    }, 15 );

else :

	add_action( 'plugins_loaded', function() {
        require_once( COVID19NEPAL_PLUGIN_DIR . 'class.covid19.front.php' );
    }, 50 );

endif;

