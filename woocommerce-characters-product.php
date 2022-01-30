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

namespace characters_custom_product;

 //tutorial: https://www.tychesoftwares.com/how-to-add-a-new-custom-product-type-in-woocommerce/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//register custom product type
    


//hooks --------------------------------------------------------------------------------------------------------------------------------------------
    //product hooks
        add_action( 'init', __NAMESPACE__ . '\cpt_register_chatacters_product_type' );
        add_filter( 'product_type_selector', __NAMESPACE__ . '\cpt_add_characters_product_type_in_products_list' );

    //enqueue scripts - front end
        add_action('wp_enqueue_scripts', __NAMESPACE__ . '\cpt_wp_enqueue_scripts', 10);
        add_action('wp_print_styles', __NAMESPACE__ . '\cpt_wp_enqueue_styles' );

    //ajax handlers
        add_action( 'wp_ajax_cpt_ajax', __NAMESPACE__ . '\cpt_ajax' );
        add_action( 'wp_ajax_nopriv_cpt_ajax', __NAMESPACE__ . '\cpt_ajax' );

// enqueue scripts and styles ------------------------------------------------------------------------------------------------------
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
            wp_enqueue_style( 'cpt-css',  plugin_dir_url( __FILE__ ) . 'assets/cpt-styles.css');
    }

// custom product setup ------------------------------------------------------------------------------------------------------------
    
    function cpt_register_chatacters_product_type(){
        class WC_Product_Characters_Product extends \WC_Product {                //I don't understand why we cannot use this class to encapsulate all our functions?
                public function __construct( $product ) {
                    $this->product_type = 'cpt_characters_product';
                    parent::__construct( $product );
                }
            }
    }

    function cpt_add_characters_product_type_in_products_list($type){
        $type[ 'cpt_characters_product' ] = __( 'Characters Product' );
        return $type;
    }

// editing cpt product meta --------------------------------------------------------------------------------------------------


// front-end custom meta field ----------------------------------------------------------------------------------------------


// ajax handlers for checking characters stock stored in meta field -----------------------------------------------------------


// checkout functions --------- ----------------------------------------------------------------------------------------------




