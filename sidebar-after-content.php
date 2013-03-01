<?php
/**
 * After Content Sidebar Template
 *
 * Displays any widgets for the After Contnent dynamic sidebar if they are available.
 *
 * @package Infusion
 * @subpackage Template
 */

if ( is_active_sidebar( 'after-content' ) ) : ?>

	<aside id="sidebar-after-content" class="sidebar" role="complementary">

		<?php dynamic_sidebar( 'after-content' ); ?>

	</aside>

<?php endif; ?>