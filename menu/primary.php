<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

		<button class="toggle-menu" type="button" role="button" aria-label="Toggle Navigation">
    		
			<span class="screen-reader-text"><?php _e( 'Navigation', 'infusion' ); ?></span>

		</button>
	
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>

	</nav>

<?php endif; // End check for menu. ?>
