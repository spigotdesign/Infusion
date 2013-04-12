<?php if ( is_active_sidebar( 'after-content' ) ) : ?>

	<aside class="sidebar sidebar-after-content" role="complementary">
		
		<div class="wrap">

			<?php dynamic_sidebar( 'after-content' ); ?>

		</div>

	</aside>

<?php endif; ?>