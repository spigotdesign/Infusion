<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : // Check for paged comments. ?>

	<div class="comments-nav">

		<?php previous_comments_link( _x( '&larr; Previous', 'comments navigation', 'spigot' ) ); ?>

		<span class="page-numbers"><?php 
			/* Translators: Comments page numbers. 1 is current page and 2 is total pages. */
			printf( __( 'Page %1$s of %2$s', 'spigot' ), get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1, get_comment_pages_count() ); 
		?></span>

		<?php next_comments_link( _x( 'Next &rarr;', 'comments navigation', 'spigot' ) ); ?>

	</div><!-- .comments-nav -->

<?php endif; // End check for paged comments. ?>