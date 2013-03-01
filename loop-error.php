<?php
/**
 * Loop Error Template
 *
 * Displays an error message when no posts are found.
 *
 * @package Infusion
 * @subpackage Template
 */
?>
	<div id="post-0" class="<?php hybrid_entry_class(); ?>">

		<div class="entry-content">

			<p><?php _e( 'Apologies, but no entries were found.', 'infusion' ); ?></p>

		</div><!-- .entry-content -->

	</div><!-- .hentry .error -->