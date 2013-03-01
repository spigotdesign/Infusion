<?php if ( has_nav_menu( 'subsidiary' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'subsidiary',
			'container'       => 'nav',
			'container_id'    => 'menu-subsidiary',
			'container_class' => 'menu',
			'container_role'  => 'navigation',
			'menu_id'         => 'menu-subsidiary-items',
			'menu_class'      => 'menu-items',
			'fallback_cb'     => '',
			'items_wrap'      => '<div class="wrap"><ul id="%1$s" class="%2$s">%3$s</ul></div>'
		)
	);

} ?>