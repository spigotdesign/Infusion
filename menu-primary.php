<?php if ( has_nav_menu( 'primary' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => 'nav',
			'container_class' => 'menu menu-primary',
			'menu_class'      => 'menu-items',
			'fallback_cb'     => '',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
		)
	);


} ?>