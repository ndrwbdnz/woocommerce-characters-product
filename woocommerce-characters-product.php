<?php
/**
 * Plugin Name: Woocommerce Characters Product
 * Plugin URI:
 * Description: Custom product type - sell chatacters (letters) in any combination, keeping stock of each character.
 * Version: 0.1
 * Author: Andrzej Bednorz
 * Author URI:
 * License: GPL3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CPT_Chatacters_Product_Type' ) ) :

class CPT_Chatacters_Product_Type{
    //class functions -------------------------------------------------------------------------------------------------------------------
        protected static $_instance;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
    
    //plugin setup functions --------------------------------------------------------------------------------------------------------------
        private $variables;
        private $settings_panel;
        public function __construct(){

            //enqueue scripts - front end
            add_action('wp_enqueue_scripts', array( $this, 'cpt_wp_enqueue_scripts'), 10);
            add_action('wp_print_styles', array( $this, 'cpt_wp_enqueue_styles') );

            //ajax handlers
            add_action( 'wp_ajax_cpt_ajax', array($this, 'cpt_ajax') );
            add_action( 'wp_ajax_nopriv_cpt_ajax', array($this, 'cpt_ajax') );

        }

        function cpt_wp_enqueue_scripts(){
            wp_enqueue_script( 'cpt-scripts', plugin_dir_url( __FILE__ ) . 'assets/cpt-scripts.js', array('jquery'), null, true );
            wp_localize_script(
                'cpt-scripts',
                'cpt_scripts_obj',
                array(
                    'ajaxurl' => admin_url( 'admin-ajax.php' ),
                    'nonce' => wp_create_nonce('cpt-ajax-nonce')
                )
            );
        }

        function cpt_wp_enqueue_styles(){
             wp_enqueue_style( 'pat-css',  plugin_dir_url( __FILE__ ) . 'assets/cpt-styles.css');
        }

    // custom product setup -----------------------------------------------------------------------------------------------------


    // editing cpt product meta --------------------------------------------------------------------------------------------------


    // front-end custom meta field ----------------------------------------------------------------------------------------------


    // ajax handlers for checking characters stock stored in meta field -----------------------------------------------------------

    
    // checkout functions ---------------------------------------------------------------------------------------------------------


}

endif;

function CPT_Chatacters_Product_Type_instance() {
	return PAT_translate_class::instance();
}

$cpt_characters_product_type_instance = CPT_Chatacters_Product_Type_instance();


