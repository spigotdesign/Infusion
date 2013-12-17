<?php if ( has_nav_menu( 'subsidiary' ) ) : // Check if there's a menu assigned to the 'subsidiary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'subsidiary' ); ?>>

		<h3 class="menu-toggle">
			<span class="screen-reader-text"><?php _e( 'Navigation', 'infusion' ); ?></span>
		</h3><!-- .menu-toggle -->

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

	</nav><!-- #menu-subsidiary -->

<?php endif; // End check for menu. ?>