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
 * @version    2.1
 * @author     Spigot Design <http://spigotdesign.com/>
 * @copyright  Copyright (c) 2014
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Get the template directory and make sure it has a trailing slash. */
$infusion_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and launch it. */
require_once( $infusion_dir . 'library/hybrid.php' );
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

	/* Theme layouts. */
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column Wide',                'infusion' ),
			'1c-narrow' => __( '1 Column Narrow',              'infusion' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'infusion' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'infusion' )
		),
		array( 'default' => '2c-l' )
	);

	/* Load stylesheets. */
	add_theme_support(
		'hybrid-core-styles',
		array( 'style' )
	);

	/* Hybrid Core functions and extensions */
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'breadcrumb-trail' );
	add_theme_support( 'cleaner-gallery' );
	add_theme_support( 'cleaner-caption' );

	/* WordPress theme support */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );

	/* Editor styles. */
	add_editor_style( infusion_get_editor_styles() );

	/* Handle content width for embeds and images. */
	// Note: this is the largest size based on the theme's various layouts.
	hybrid_set_content_width( 1025 );

	/* Register custom image sizes. */
	// add_action( 'init', 'infusion_register_image_sizes', 5 );

	/* Register custom menus. */
	add_action( 'init', 'infusion_register_menus', 5 );

	/* Register sidebars. */
	add_action( 'widgets_init', 'infusion_register_sidebars', 5 );

	/* Add custom styles and scripts. */
	add_action( 'wp_enqueue_scripts', 'infusion_enqueue_scripts' );

	/* Register admin styles and scripts. */
	add_action( 'admin_enqueue_scripts', 'infusion_admin_register_styles', 0 );

	/* Adds custom settings for the visual editor. */
	add_filter( 'tiny_mce_before_init', 'infusion_tiny_mce_before_init' );

	/* Modifies the theme layout. */
	// add_filter( 'theme_mod_theme_layout', 'infusion_mod_theme_layout', 15 );

	/* Removes post type support */
	add_action( 'init', 'infusion_remove_post_type_support', 15 );


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
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function infusion_register_menus() {
	register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'infusion' ) );
	register_nav_menu( 'secondary', _x( 'Secondary', 'nav menu location', 'infusion' ) );
	register_nav_menu( 'social',    _x( 'Social',    'nav menu location', 'infusion' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
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
 * @since  1.0.0
 * @access public
 * @return void
 */
function infusion_enqueue_scripts() {

  	// Header
	wp_enqueue_script( 'modernizr', trailingslashit( get_template_directory_uri() ) . '/js/build/modernizr.min.js', array( 'jquery' ), '2.8.3', false );

	// Footer
	wp_enqueue_script( 'plugins', trailingslashit( get_template_directory_uri() ) . 'js/build/plugins.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'scripts', trailingslashit( get_template_directory_uri() ) . 'js/build/scripts.min.js', array( 'jquery' ), null, true );

	// Stylesheets
	// wp_register_style( 'infusion-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Bitter' );


}

/**
 * Registers stylesheets for use in the admin.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function infusion_admin_register_styles() {

	wp_register_style( 'custom_wp_admin_css', trailingslashit( get_template_directory_uri() ) . '/css/admin-style.css', false, '1.0.0' );

}

/**
 * Callback function for adding editor styles.  Use along with the add_editor_style() function.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function infusion_get_editor_styles() {

	/* Set up an array for the styles. */
	$editor_styles = array();

	/* Add the theme's editor styles. */
	$editor_styles[] = trailingslashit( get_template_directory_uri() ) . 'css/editor-style.css';

	/* If a child theme, add its editor styles. Note: WP checks whether the file exists before using it. */
	if ( is_child_theme() && file_exists( trailingslashit( get_stylesheet_directory() ) . 'css/editor-style.css' ) )
		$editor_styles[] = trailingslashit( get_stylesheet_directory_uri() ) . 'css/editor-style.css';

	/* Add the locale stylesheet. */
	$editor_styles[] = get_locale_stylesheet_uri();

	/* Uses Ajax to display custom theme styles added via the Theme Mods API. */
	$editor_styles[] = add_query_arg( 'action', 'infusion_editor_styles', admin_url( 'admin-ajax.php' ) );

	/* Return the styles. */
	return $editor_styles;
}

/**
 * Adds the <body> class to the visual editor.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $settings
 * @return array
 */
function infusion_tiny_mce_before_init( $settings ) {

	$settings['body_class'] = join( ' ', get_body_class() );

	return $settings;
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
