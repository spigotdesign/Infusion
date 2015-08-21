<?php
/**
 * Template Name: Front Page
 *
 * This is the template used for displaying the home page. 
 *
 * @package Infusion
 * @subpackage Template
 */

get_header(); ?>

<?php if ( have_posts() ) : // Checks if any posts were found. ?>

<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

	<?php the_post(); // Loads the post data. ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<header class="entry-header">
			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
		</header>

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<footer class="entry-footer">
			<?php edit_post_link(); ?>
		</footer>

	</main>

<?php endwhile; // End found posts loop. ?>

<?php endif; // End check for posts. ?>

<?php get_footer(); // Loads the footer.php template. ?>