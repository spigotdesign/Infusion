<?php if ( is_active_sidebar( 'after-content' ) ) : ?>

	<aside id="sidebar-after-content" class="sidebar" role="complementary">
		
		<div class="wrap">

			<?php dynamic_sidebar( 'after-content' ); ?>

		</div>

	</aside>

<?php endif; ?>