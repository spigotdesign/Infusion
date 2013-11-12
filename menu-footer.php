<?php if ( has_nav_menu( 'footer' ) ) {

	wp_nav_menu(
		array(
			'theme_location'  => 'footer',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'menu-footer',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		)
	);

} ?>
