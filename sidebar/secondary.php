<?php if ( is_active_sidebar( 'secondary' ) ) : ?>

	<aside class="sidebar-secondary sidebar" role="complementary" aria-label="Secondary Sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

		<?php dynamic_sidebar( 'secondary' ); ?>

	</aside>

<?php endif; ?>