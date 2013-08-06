<?php if ( is_active_sidebar( 'before-content' ) ) : ?>

	<aside class="sidebar sidebar-before-content" role="complementary">
		
		<div class="wrap">

			<?php dynamic_sidebar( 'before-content' ); ?>

		</div>

	</aside>

<?php endif; ?>