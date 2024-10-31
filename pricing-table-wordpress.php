<?php
/*
Plugin Name: Pricing Table WordPress
Plugin URI: http://themepoints.com/pricing-table-wordpress
Description: This pack of CSS3 Pricing Tables is a complete solution for building awesome pricing tables in a minutes.
Version: 1.0
Author: Themepoints
Author URI: http://themepoints.com
TextDomain: ptwlang
License: GPLv2
*/


if ( ! defined( 'ABSPATH' ) )
die( "Can't load this file directly" );


define('PRICING_TABLE_WP_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('pricing_table_wp_plugin_dir', plugin_dir_path( __FILE__ ) );



/*==========================================================================
	After setup plugins
==========================================================================*/

function pricing_table_wordpress_init() {
	// include pricing post type
    include("inc/pricing-table-wordpress-post-type.php");
	// register post type
	add_action('init', 'pricing_table_wordpress_post_types_register');
	// custom title
	add_filter( 'enter_title_here', 'pricing_table_wordpress_title' );
	// Include Meta Box Class File
	include( plugin_dir_path( __FILE__ ) . 'metabox/custom-meta-boxes.php' );
	// Include pricing theme File
	include( plugin_dir_path( __FILE__ ) . 'themes/pricing-table-wordpress-themes.php' );	
	// enqueue scripts
	add_action('wp_enqueue_scripts', 'pricing_table_wordpress_post_script');
	// add text domain
	add_action('plugins_loaded', 'pricing_table_wordpress_load_textdomain');
	// admin enqueue scripts
	add_action('admin_enqueue_scripts', 'pricing_table_wordpress_admin_enqueue_scripts');
	// add meta boxes
	add_action( 'add_meta_boxes', 'pricing_table_wordpress_add_custom_box' );
	// Do something with the data entered
	add_action( 'save_post', 'pricing_table_wordpress_save_postdata' );
	// filter meta boxes
	add_filter( 'cmb_meta_boxes', 'pricing_table_wordpress_filter_meta_box' );
}
add_action('after_setup_theme', 'pricing_table_wordpress_init');



/*==========================================================================
	pricing table wordpress enqueue scripts
==========================================================================*/
function pricing_table_wordpress_post_script()
	{
    wp_enqueue_script("jquery-ui-sortable");
    wp_enqueue_script("jquery-ui-draggable");
    wp_enqueue_script("jquery-ui-droppable");
	wp_enqueue_style('pricing-table-style', PRICING_TABLE_WP_PLUGIN_PATH.'css/pricing-table-wordpress.css');	
	wp_enqueue_style('pricing-table-fonts', PRICING_TABLE_WP_PLUGIN_PATH.'css/font-awesome.css');	
	}


/*==========================================================================
	pricing table wordpress Load Translation
==========================================================================*/
function pricing_table_wordpress_load_textdomain(){
	load_plugin_textdomain('ptwlang', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
}


/*==========================================================================
	pricing table wordpress Admin enqueue scripts
==========================================================================*/
function pricing_table_wordpress_admin_enqueue_scripts(){
		global $typenow;

		if(($typenow == 'ptwposttype')){
	    wp_enqueue_style('pricing-admin-css', PRICING_TABLE_WP_PLUGIN_PATH.'admin/css/pricing-table-admin.css');
		wp_enqueue_script('pricing-admin-js', PRICING_TABLE_WP_PLUGIN_PATH.'admin/js/pricing-table-admin.js', array('jquery'), '1.0.0', true );			
		
        wp_enqueue_style('wp-color-picker');	
        wp_enqueue_script( 'pricing_table_color_picker', plugins_url('admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
        wp_enqueue_script("jquery-ui-sortable");
        wp_enqueue_script("jquery-ui-draggable");
        wp_enqueue_script("jquery-ui-droppable");		
		}
}




/*==========================================================================
	pricing table wordpress meta boxes
==========================================================================*/

function pricing_table_wordpress_filter_meta_box( $meta_boxes ) {
  $meta_boxes[] = array(

    'id'          => 'pricing_table_wp_feature',
    'title'       => 'Pricing Column Features',
    'pages'       => array('ptwposttype'),
    'context'     => 'normal',
    'priority'    => 'high',
    'show_names'  => true, // Show field names on the left
    'fields' => array(

      array(
        'id'   => 'pricing_table_wp_columns',
        'name'    => 'Pricing Table Details', 
        'type' => 'group',
        'repeatable'     => true,
        'repeatable_max' => 3,
        
        'fields' => array(

          array(
            'id'              => 'pricing_table_wordpress_title',
            'name'            => 'Pricing Table Title',                
            'type'            => 'text',
            'cols'            => 3
            ),          

          array(
            'id'              => 'pricing_wordpress_sub_title',
            'name'            => 'Sub Title',                
            'type'            => 'text',
            'cols'            => 3
            ),

          array( 
            'id'      => 'pricing_wordpress_header_bg_color', 
            'name'    => 'Header Bg Color', 
            'type'    => 'colorpicker', 
            'cols'    =>  3,
            'default' => '#ddd'
            ),

          array( 
            'id'      => 'pricing_wordpress_header_font_color', 
            'name'    => 'Header Font Color', 
            'type'    => 'colorpicker', 
            'cols'    =>  3,
            'default' => '#000'
            ),

          array(
            'id'              => 'pricing_table_wordpress_features_column',
            'name'            => 'Features',                
            'type'            => 'text',
            'repeatable'      => true,
            'repeatable_max'  => 4,
            'cols'            => 4
            ),

          array(
            'id'              => 'pricing_table_wordpress_package_currency',
            'name'            => 'Currency', 
            'type'            => 'text',
            'cols'            => 2,
            'default'         => '$'
            ),

          array(
            'id'              => 'pricing_table_wordpress_package_price',
            'name'            => 'Price ( USD $ )', 
            'type'            => 'text',
            'cols'            => 2,
            'default'         => '10'
            ),

          array(
            'id'              => 'pricing_table_wordpress_pricing_per',
            'name'            => 'Weak / Month / Year',                
            'type'            => 'text',
            'cols'            => 2,
            'default'         => 'month'
            ),

          array(
            'id'              => 'pricing_table_wordpress_package_buy_link',
            'name'            => 'Buy Now Link',                
            'type'            => 'text_url',
            'default'         => '#',
            'cols'            => 4                
            ),

          array(
            'id'              => 'pricing_table_wordpress_package_buy_button',
            'name'            => 'Button Text',                
            'type'            => 'text',
            'cols'            => 2,
            'default'         => 'Sign Up'
            )

          )
      )
  )
);


return $meta_boxes;
}

/*==========================================================================
	pricing table wordpress register shortcode
==========================================================================*/
function pricing_table_wordpress_shortcode_register($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'id' => "",
		), $atts);
		global $post;
		$post_id = $atts['id'];
		
		$content = '';
        $content.= Pricing_Table_wordpress_table_body($post_id);
		return $content;
}

// shortcode hook
add_shortcode('ptwcode', 'pricing_table_wordpress_shortcode_register');