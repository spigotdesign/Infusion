<?php if ( has_nav_menu( 'subsidiary' ) ) : // Check if there's a menu assigned to the 'subsidiary' location. ?>

	<nav class="menu-subsidiary" aria-label="Subsidiary Menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'subsidiary',
				'container'       => '',
				'menu_id'         => 'menu-subsidiary-items',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => '',
				'items_wrap'      => '<div class="wrap"><ul id="%s" class="%s">%s</ul></div>'
			)
		); ?>

	</nav>

<?php endif; // End check for menu. ?>

