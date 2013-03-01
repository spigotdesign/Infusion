<?php
/**
 * Loop div Template
 *
 * This template is used to show your your next/previous post links on singular pages and
 * the next/previous posts links on the home/posts page and archive pages.
 *
 * @package Infusion
 * @subpackage Template
 */
?>

	<?php if ( is_attachment() ) : ?>

		<nav class="loop-nav" role="navigation">
			<?php previous_post_link( '%link', '<span class="previous">' . __( '&larr; Return to entry', 'infusion' ) . '</span>' ); ?>
		</nav><!-- .loop-nav -->

	<?php elseif ( is_singular( 'post' ) ) : ?>

		<nav class="loop-nav" role="navigation">
			<?php previous_post_link( '<div class="previous">' . __( 'Previous Entry: %link', 'infusion' ) . '</div>', '%title' ); ?>
			<?php next_post_link( '<div class="next">' . __( 'Next Entry: %link', 'infusion' ) . '</div>', '%title' ); ?>
		</nav><!-- .loop-nav -->

	<?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination(); ?>

	<?php elseif ( !is_singular() && $div = get_posts_nav_link( array( 'sep' => '', 'prelabel' => '<span class="previous">' . __( '&larr; Previous', 'infusion' ) . '</span>', 'nxtlabel' => '<span class="next">' . __( 'Next &rarr;', 'infusion' ) . '</span>' ) ) ) : ?>

		<nav class="loop-nav" role="navigation">
			<?php echo $nav; ?>
		</nav><!-- .loop-nav -->

	<?php endif; ?>