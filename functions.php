<?php
/**
 * The functions file is used to initialize everything in the theme.  It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters.  If making customizations, users 
 * should create a child theme and make changes to its functions.php file (not this one).   
 *
 * @package infusion
 * @subpackage Functions
 * @version 1.1
 * @author Bryan Hoffman
 * @copyright Copyright (c) 2012 Bryan Hoffman
 * @link http://spigotdesign.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'infusion_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.  Most of the important functions should be set up in the child theme.
 *
 * @since 0.1.0
 */
function infusion_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Add content editor styles. */
	// add_editor_style( 'css/editor-style.css' );
	
	/* Add support for auto-feed links. */
	add_theme_support( 'automatic-feed-links' );

	
	
}

?>