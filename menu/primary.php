<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<button class="toggle-menu" type="button" role="button" aria-label="Toggle Navigation">
    		
		<span class="screen-reader-text"><?php _e( 'Navigation', 'leadercreative' ); ?></span>

	</button>

	<ul class="toggle-btns">
		<li class="tel"><a href="tel:4356141342"><i class="icon-phone"></i></a></li>
	</ul>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>
	
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
