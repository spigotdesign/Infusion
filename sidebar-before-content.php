<?php
/**
 * Before Content Sidebar Template
 *
 * Displays any widgets for the After Singular dynamic sidebar if they are available.
 *
 * @package Infusion
 * @subpackage Template
 */

if ( is_active_sidebar( 'before-content' ) ) : ?>

	<aside id="sidebar-before-content" class="sidebar" role="complementary">

		<?php dynamic_sidebar( 'before-content' ); ?>

	</aside>

<?php endif; ?>