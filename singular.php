<?php
/**
 * Singular Template
 *
 * This is the default singular template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
 *
 * @package Infusion
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php get_sidebar( 'before-content' ); // Loads the sidebar-before-content.php template. ?>

	<?php do_atomic( 'before_content' ); // infusion_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // infusion_open_content ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // infusion_before_entry ?>

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>" role="article">

						<?php do_atomic( 'open_entry' ); // infusion_open_entry ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<section class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'infusion' ) . '</section>' ); ?>

						<div class="entry-content">
						
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'infusion' ) ); ?>
							
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'infusion' ), 'after' => '</p>' ) ); ?>
							
						</div><!-- .entry-content -->

						<?php do_atomic( 'close_entry' ); // infusion_close_entry ?>

					</article><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // infusion_after_entry ?>

					<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>

					<?php do_atomic( 'after_singular' ); // infusion_after_singular ?>

					<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php do_atomic( 'close_content' ); // infusion_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // infusion_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>