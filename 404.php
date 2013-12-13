<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site. By default, the template will 
 * display a generic message.
 *
 * @package infusion
 * @subpackage Template
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since 1.2.2
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); // Loads the header.php template. ?>

	<main <?php hybrid_attr( 'error' ); ?>>

		<h1 class="error-404-title entry-title"><?php _e( '404 Error: Page Not Found', 'infusion' ); ?></h1>

		<div class="entry-content">

			<p><?php printf( __( 'You tried going to %1$s, and it can’t be found. Sorry!', 'infusion' ), '<code>' . site_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>

			<p>There could be a few different reasons for this:</p>

				<ul>
					<li>The page was moved.</li>
					<li>The page no longer exists.</li>
					<li>The URL is slightly incorrect.</li>
				</ul>

			<p>To get you back on track, please use the navigation to browse, or try searching: </p>

			<?php get_search_form(); ?>

		</div>

	</main>

<?php get_footer(); // Loads the footer.php template. ?>