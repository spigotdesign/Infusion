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
 * @version    2.0
 * @author     Spigot Design <http://spigotdesign.com/>
 * @copyright  Copyright (c) 2013
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
	
	/* Load files. */
	require_once( trailingslashit( get_template_directory() ) . 'inc/infusion.php' );

	/* Theme layouts. */
	add_theme_support( 
		'theme-layouts', 
		array(
			'1c'        => __( '1 Column Wide',                'infusion' ),
			'1c-narrow' => __( '1 Column Narrow',              'infusion' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'infusion' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'infusion' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' ) 
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
	
	
}
