<?php if ( has_nav_menu( 'subsidiary' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'subsidiary',
			'container'       => 'nav',
			'container_class' => 'menu menu-subsidiary',
			'menu_class'      => 'menu-subsidiary-items',
			'fallback_cb'     => '',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
		)
	);

} ?>