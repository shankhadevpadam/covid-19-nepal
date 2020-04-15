<?php

/**
 * Main class for WP-Admin hooks
 *
 * This class loads all of our backend hooks and sets up admin interfaces
 *
 * @subpackage Admin interfaces
 * @author Padam Shankhadev
 * @since 1.0
 * @var opts - plugin options
 */
class Covid19_Admin
{
    /**
     *  Covid-19 Nepal Admin constructor
     *
     * Constructor first checks for the plugin version, and if this is the first activation, plugin adds version info in the DB with autoload option set to false.
     * That way we can easily update across versions, if we decide to add options to the plugin, or change plugin settings and defaults
     *
     * @return void
     * @author Padam Shankhadev
     * @since 1.0
     */
    public function __construct()
    {
    	add_action( 'admin_menu', array( $this, 'covid19_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_covid19_script_style') );
    }

    public function covid19_menu()
    {
    	add_menu_page(
    		'Covid-19 Nepal',
    		'Covid-19 Nepal',
    		'edit_posts',
    		'covid19_nepal',
    		array($this, 'covid19_nepal'),
    		COVID19NEPAL_PLUGIN_URL . 'images/covid-19.png' 
	    );
    }

    public function admin_covid19_script_style()
    {
        wp_enqueue_style( 'admin_covid19_nepal_style',  COVID19NEPAL_PLUGIN_URL . 'css/admin-covid19-nepal.css' );
    }

    public function covid19_nepal()
    {
    	echo '<div class="wrap">
                <div class="covid19-banner"></div>
    		  </div>
    	';
    }
}

new Covid19_Admin;