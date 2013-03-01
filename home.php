<?php
/**
 * Home Template
 *
 * This is the home template.  Technically, it is the "posts page" template.  It is used when a visitor is on the 
 * page assigned to show a site's latest blog posts.
 *
 * @package infusion
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php get_sidebar( 'before-content' ); // Loads the sidebar-before-content.php template. ?>

	<?php do_atomic( 'before_content' ); // infusion_before_content ?>
	
	<div id="content" role="log">

		<?php do_atomic( 'open_content' ); // infusion_open_content ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // infusion_before_entry ?>

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // infusion_open_entry ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
						
						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'infusion' ) . '</div>' ); ?>
						
						<?php get_the_image(array('custom_key' => array('Feature', 'Feature Image'), 'default_size' => 'thumbnail')); ?>
						
						<div class="entry-summary">
							
							<?php the_excerpt(); ?>
							
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'infusion' ), 'after' => '</p>' ) ); ?>
						
						</div>

						<?php echo apply_atomic_shortcode( 'entry_meta', '<section class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'infusion' ) . '</section>' ); ?>

						<?php do_atomic( 'close_entry' ); // infusion_close_entry ?>

					</article>

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