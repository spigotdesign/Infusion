<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<?php the_title( '<h1 class="page-title"><a href="' . get_permalink() . '">', '</a></h1>' ); ?>

		<div class="page-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } else { ?>

		<?php the_title( '<h2 class="page-title"><a href="' . get_permalink() . '">', '</a></h2>' ); ?>

		<div class="page-summary">
			<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image(); ?>
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } ?>

</article>