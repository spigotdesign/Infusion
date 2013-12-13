<?php
/**
 * Template Name: Front Page
 *
 * This is the template used to display the home page. 
 *
 * @package infusion-child
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="content">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div id="page-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

					<div class="entry-content">

						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', hybrid_get_parent_textdomain() ) ); ?>

						<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_parent_textdomain() ), 'after' => '</p>' ) ); ?>

					</div><!-- .entry-content -->
							
				</div><!-- .hentry -->


			<?php endwhile; ?>

		<?php endif; ?>		
  		
	</div><!-- .content -->

<?php get_footer(); // Loads the footer.php template. ?>