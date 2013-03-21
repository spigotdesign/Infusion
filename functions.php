<?php
/**
 * The functions file is used to initialize everything in the theme.  It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters.  If making customizations, users 
 * should create a child theme and make changes to its functions.php file (not this one).   
 *
 * @package infusion
 * @subpackage Functions
 * @version 1.2.2
 * @author Bryan Hoffman
 * @copyright Copyright (c) 2013 Bryan Hoffman
 * @link http://spigotdesign.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );
$theme = new Hybrid();

?>