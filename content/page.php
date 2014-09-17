<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_page() ) : // If viewing a single page. ?>

		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

	<?php else : // If not viewing a single page. ?>

		<?php get_the_image( array( 'size' => 'full' ) ); ?>
		
		<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single page check. ?>

</article><!-- .entry -->