<article <?php hybrid_post_attributes(); ?>>

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<h1 class="entry-title page-title"><?php single_post_title(); ?></h1>

		<div class="page-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } else { ?>

		<?php the_title( '<h2 class="entry-title page-title"><a href="' . get_permalink() . '">', '</a></h2>' ); ?>

		<div class="page-summary">
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } ?>

</article>