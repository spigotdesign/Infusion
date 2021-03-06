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
 * @version    2.3.0
 * @author     Spigot Design <http://spigotdesign.com/>
 * @copyright  Copyright (c) 2015
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Get the template directory and make sure it has a trailing slash. */
$infusion_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and launch it. */
require_once( $infusion_dir . 'hybrid-core/hybrid.php' );
new Hybrid();

add_action( 'after_setup_theme', 'infusion_theme_setup', 5 );

/**
 * The theme setup function.  This function sets up support for various WordPress and framework functionality.
 *
 * @since  1.0
 * @access public
 * @return void
 */
function infusion_theme_setup() {

	// Load BEM menu
	require_once( trailingslashit( get_template_directory() ) . 'inc/wp_bem_menu.php' );

	// Load stylesheets
	add_action( 'wp_enqueue_scripts', 'infusion_styles' );

	// Layout Support
	add_theme_support( 'theme-layouts', array( 'default' => '1c' ) );
	add_action( 'hybrid_register_layouts', 'infusion_register_layouts' );

	// Hybrid Core functions and extensions
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'get-the-image' );

	// WordPress theme support
	add_theme_support( 'automatic-feed-links' );

	// Remove WordPress stuff
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wp_generator');

	// Register custom menus.
	add_action( 'init', 'infusion_register_menus', 5 );

	// Register sidebars.
	add_action( 'widgets_init', 'infusion_register_sidebars', 5 );

	// Add custom styles and scripts.
	add_action( 'wp_enqueue_scripts', 'infusion_enqueue_scripts' );

	
	// Register custom image sizes. 
	// add_action( 'init', 'infusion_register_image_sizes', 5 );

	// Modifies the theme layout.
	// add_filter( 'theme_mod_theme_layout', 'infusion_mod_theme_layout', 15 );

	// Gravity Forms enable Label visiblity
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


}

/**
 * Registers stylesheets for the frontend
 *
 */

function infusion_styles() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}


/**
 * Registers custom theme layouts
 *
 */

function infusion_register_layouts() {

    hybrid_register_layout(
        '1c',
        array(
            'label'            => _x( '1 Column', 'theme layout', 'infusion' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/img/layouts/1c.svg', 
        )
    );

    hybrid_register_layout(
        '2c-l',
        array(
            'label'            => _x( '2 Columns: Sidebar / Content', 'theme layout', 'infusion' ),
            'is_global_layout' => true,
            'is_post_layout'   => true,
            'image'            => '%s/img/layouts/2c-l.svg', 
        )
    );

    
}

/**
 * Registers nav menu locations.
 *
 */

function infusion_register_menus() {
	register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'infusion' ) );
	register_nav_menu( 'secondary', _x( 'Secondary', 'nav menu location', 'infusion' ) );
	register_nav_menu( 'social',    _x( 'Social',    'nav menu location', 'infusion' ) );
}

/**
 * Registers sidebars.
 *
 */

function infusion_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'infusion' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'infusion' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'infusion' ),
			'description' => __( 'A sidebar located in the footer of the site. Optimized for one, two, or three widgets (and multiples thereof).', 'infusion' )
		)
	);
}

/**
 * Enqueues scripts.
 *
 */

function infusion_enqueue_scripts() {

	// Header
	wp_enqueue_script( 'modernizr', trailingslashit( get_template_directory_uri() ) . 'js/build/modernizr-custom.min.js', array( 'jquery' ), null, false );

	// Footer
	wp_enqueue_script( 'plugins', trailingslashit( get_template_directory_uri() ) . 'js/build/plugins.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'scripts', trailingslashit( get_template_directory_uri() ) . 'js/build/scripts.min.js', array( 'jquery' ), null, true );

	// Stylesheets
	// wp_register_style( 'infusion-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Bitter' );


}

/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function infusion_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	// set_post_thumbnail_size( 175, 131, true );

	/* Adds the 'infusion-full' image size. */
	// add_image_size( 'infusion-full', 1025, 500, false );
}


/**
 * Removes post_type support from post types.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $layout
 * @return string
 */

function infusion_remove_post_type_support() {

	// remove_post_type_support( 'my-cpt-name', 'theme-layouts' );

}


/**
 * Modifies the theme layout
 *
 * @since  1.0
 * @access public
 * @param  string  $layout
 * @return string
 */
function infusion_mod_theme_layout( $layout ) {

	if ( is_home() || is_singular('post') || is_404() ) {

        $layout = '2c-l';

    } elseif ( is_archive() && !is_archive('portfolio') ) {
        
        $layout = '2c-l';

    }

	return $layout;
}
