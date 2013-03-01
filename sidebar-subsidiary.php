<?php
/**
 * Subsidiary Sidebar Template
 *
 * Displays widgets for the Subsidiary dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 * @package Infusion
 * @subpackage Template
 */

if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<aside id="sidebar-subsidiary" class="sidebar" role="complementary">
		
		<div class="wrap">

		<?php dynamic_sidebar( 'subsidiary' ); ?>

		</div>

	</aside>

<?php endif; ?>