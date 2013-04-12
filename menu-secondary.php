<?php if ( has_nav_menu( 'secondary' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'secondary',
			'container'       => 'nav',
			'container_class' => 'menu menu-secondary',
			'menu_class'      => 'menu-secondary-items',
			'fallback_cb'     => '',
			'items_wrap'      => '<ul>%3$s</ul>'
		)
	);

} ?>