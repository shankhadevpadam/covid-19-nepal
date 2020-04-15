<?php

/**
 * Covid19 plugin class.
 *
 * This class loads plugin options, sets filters and converts the date on selected hooks.
 *
 * @subpackage Frontend interfaces
 * @author Padam Shankhadev
 * @since 1.0
 * @var opts - plugin options
 */
class Covid19_Frontend
{

    private $opts;

    /**
     * Class Constructor
     *
     * Loads default options, sets default filter list and adds convert_date filter to selected locations
     *
     * @author Padam Shankhadev
     * @since 1.0
     */
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'covid19_script_style') );
        add_shortcode( 'covid19_nepal', array( $this, 'covid19_shortcode' ) );
    }

    public function covid19_script_style()
    {
         wp_enqueue_style( 'covid19_nepal_style',  COVID19NEPAL_PLUGIN_URL . 'css/covid19-nepal.css' );

         wp_register_script( 'covid19_nepal_script', COVID19NEPAL_PLUGIN_URL . 'js/covid19-nepal.js', array('jquery'), '1.0', true );
 
        wp_enqueue_script('covid19_nepal_script');
    }

    public function covid19_shortcode()
    {

        include 'covid19.template.php';
    }

}

new Covid19_Frontend;