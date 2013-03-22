<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>

		<div class="page-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } else { ?>

		<header class="page-header">
			<?php the_title( '<h2 class="page-title"><a href="' . get_permalink() . '">', '</a></h2>' ); ?>
		</header>

		<div class="page-summary">
			<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image(); ?>
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'infusion' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div>

	<?php } ?>

</article>