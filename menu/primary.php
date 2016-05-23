<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<?php wp_nav_menu(
		array(
			'theme_location'	=> 'primary',
			'container'			=> '',
			'menu_class'      	=> 'site-nav__list',
			'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
			'walker' 			=> new bem_walker('site-nav')
		)
	); ?>

	<button class="toggle-menu" type="button" aria-label="Toggle Navigation">
    		
		<span class="screen-reader-text"><?php _e( 'Navigation', 'channelsignal' ); ?></span>

	</button>

<?php endif; ?>
