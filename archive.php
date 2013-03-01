<?php
/**
 * Archive Template
 *
 * The archive template is the default template used for archives pages without a more specific template. 
 *
 * @package infusion
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php get_sidebar( 'before-content' ); // Loads the sidebar-before-content.php template. ?>

	<?php do_atomic( 'before_content' ); // infusion_before_content ?>

	<div id="content" role="log">

		<?php do_atomic( 'open_content' ); // infusion_open_content ?>

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // infusion_before_entry ?>

					<article id="post-<?php the_ID(); ?>" role="article" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // infusion_open_entry ?>

						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'infusion' ) . '</div>' ); ?>

						<div class="entry-summary">
						
							<?php the_excerpt(); ?>
							
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'infusion' ), 'after' => '</p>' ) ); ?>
						
						</div><!-- .entry-summary -->

						<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'infusion' ) . '</div>' ); ?>

						<?php do_atomic( 'close_entry' ); // infusion_close_entry ?>

					</article><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // infusion_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		<?php do_atomic( 'close_content' ); // infusion_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // infusion_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>