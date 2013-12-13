<?php
/**
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    Infusion
 * @subpackage Functions
 * @version    3.0
 * @author     Spigot Design <info@spigotdesign.com>
 * @copyright  Copyright (c) 2013
 * @link       http://spigotdesign.com
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Get the template directory and make sure it has a trailing slash. */
$infusion_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and launch it. */
require_once( $infusion_dir . 'library/hybrid.php' );
new Hybrid();
 
add_action( 'after_setup_theme', 'infusion_theme_setup', 5 );

function infusion_theme_setup() {

	add_theme_support( 'hybrid-core-menus', array( 'primary', 'secondary', 'subsidiary' ) ); 
	add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'secondary', 'subsidiary', 'header', 'after-singular' ) );
	add_theme_support( 'hybrid-core-scripts', array( 'comment-reply', 'drop-downs', 'nav-bar', 'mobile-toggle' ) );
	add_theme_support( 'hybrid-core-styles', array( 'style' ) );

	add_theme_support( 'hybrid-core-widgets' ); 
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ), array( 'default' => '1c', 'customizer' => true ) );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );

	add_theme_support( 'post-stylesheets' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'breadcrumb-trail' );
	add_theme_support( 'cleaner-gallery' );
	add_theme_support( 'cleaner-caption' );

	// WordPress theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );
	add_theme_support( 'featured-header' );

	// Set content width for embeds and images.
	hybrid_set_content_width( 1280 );
	add_theme_support( 'entry-views' );
	
	// add_theme_support( 'random-custom-background' );	

	//  Add Custom Actions here
	// add_action( 'wp_head', 'show_template');
	// add_action( 'init', 'infusion_register_menus' );
	add_action( 'template_redirect', 'infusion_one_column' );
	add_action( 'init', 'infusion_remove_post_type_support', 15 );
	add_action( 'wp_enqueue_scripts', 'infusion_frontend_scripts_styles');
	add_action( 'admin_enqueue_scripts', 'infusion_admin_style');
	

	// Add Custom Filters here
	add_filter( 'sidebars_widgets', 'infusion_disable_sidebars' );
	
	
}

/**
 * Function to show what template file is currently being used.
 * 
 */ 
function show_template() {  
    global $template;
    echo '<span class="show-template">' . $template . '</span>';
}

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since  1.0
 */
function infusion_one_column() {

		
}


/**
 * Register Menu
 *
 * @since  1.0
 */


function infusion_register_menus() {
  
	register_nav_menu('footer',__( 'Footer Menu' ));
	register_nav_menu('social',__( 'Social Menu' ));

}


/**
 * Filters 'get_theme_layout' by returning '1c'.
 *
 * @since 1.0
 * @param string $layout The layout of the current page.
 * @return string
 */
function infusion_layout_1c( $layout ) {
	return '1c';
}


/**
 * Disables sidebars if viewing a one column page. 
 *
 * @since 1.0
 */
function infusion_disable_sidebars( $sidebars_widgets ) {
	global $wp_customize;

	$customize = ( is_object( $wp_customize ) && $wp_customize->is_preview() ) ? true : false;

	if ( !is_admin() && current_theme_supports( 'theme-layouts' ) ) {

		if ( '1c' == get_theme_mod( 'theme_layout', '1c' ) ) {
			$sidebars_widgets['primary'] = false;
			
		}
	}

	return $sidebars_widgets;
}

/**
 * Remove theme-layout support from Custom Post Type pages
 *
 * @since 1.0
 */

function infusion_remove_post_type_support() {

	// remove_post_type_support( 'my-cpt-name', 'theme-layouts' );
	
}



/*
 * Load Header Scripts
 *
 * @since 1.0
 */

function infusion_frontend_scripts_styles() {
 	
 	// Scripts
 	wp_enqueue_script( 'jQuery');

	wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', '', '2.6.2', false );
	wp_enqueue_script( 'plugins', get_stylesheet_directory_uri() . '/js/plugins-ck.js', '', '2.0', true ); // Use plugins.js if not using Codekit
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts-ck.js', '', '2.0', true ); // Use scripts.js if not using Codekit

	// Stylesheets
    // wp_enqueue_style('google_fonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|EB+Garamond');

    // Dequeue Styles
 
}
 
/*
 * Admin Sytlesheet
 *
 * @since 1.0
 */
 
function infusion_admin_style(){
    wp_register_style( 'custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}




