<?php
/**
 * After Singular Sidebar Template
 *
 * Displays any widgets for the After Singular dynamic sidebar if they are available.
 *
 * @package Infusion
 * @subpackage Template
 */

if ( is_active_sidebar( 'after-singular' ) ) : ?>

	<aside id="sidebar-after-singular" class="sidebar" role="complementary">

		<?php dynamic_sidebar( 'after-singular' ); ?>

	</aside>

<?php endif; ?>