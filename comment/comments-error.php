<?php if ( pings_open() && !comments_open() ) : ?>

	<p class="comments-closed pings-open">
		<?php
			printf( __( 'Comments are closed, but %strackbacks%s and pingbacks are open.', 'spigot' ), '<a href="' . esc_url( get_trackback_url() ) . '">', '</a>' );
		?>
	</p>

<?php elseif ( !comments_open() ) : ?>

	<p class="comments-closed">
		<?php _e( 'Comments are closed.', 'spigot' ); ?>
	</p>

<?php endif; ?>