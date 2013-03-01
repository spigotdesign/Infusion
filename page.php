<?php
/**
 * Page Template
 *
 * This is the default page template.  It is used when a more specific template can't be found to display 
 * singular views of pages.
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

					<div id="page-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // infusion_open_entry ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<div class="entry-content">
						
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'infusion' ) ); ?>
							
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'infusion' ), 'after' => '</p>' ) ); ?>
						
						</div>

  				</div>

					<?php do_atomic( 'after_entry' ); // infusion_after_entry ?>

					<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>

					<?php do_atomic( 'after_singular' ); // infusion_after_singular ?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php do_atomic( 'close_content' ); // infusion_close_content ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // infusion_after_content ?>
	
	<?php get_sidebar( 'after-content' ); // Loads the sidebar-subsidiary.php template. ?>

<?php get_footer(); // Loads the footer.php template. ?>