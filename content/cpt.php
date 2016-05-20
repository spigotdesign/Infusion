<?php if ( is_singular( get_post_type() ) ) : ?>

	<article <?php hybrid_attr( 'post' ); ?>>

		

	</article>

<?php else : // Multi Post Pages ?>

	<article <?php hybrid_attr( 'post' ); ?>>


	</article>

<?php endif; // End single post check. ?>
