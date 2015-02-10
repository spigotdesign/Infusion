<?php if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<aside class="sidebar-subsidiary sidebar" role="complementary" aria-label="Subsidiary Sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	
		<?php dynamic_sidebar( 'subsidiary' ); ?>

	</aside>

<?php endif; ?>