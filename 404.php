<?php @header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); ?>

	<?php get_sidebar( 'before-content' ); ?>

	<div id="content">

		<div id="post-0" class="<?php hybrid_entry_class(); ?>">

			<h1 class="error-404-title entry-title"><?php _e( 'Not Found', 'infusion' ); ?></h1>

			<div class="entry-content">

				<p>
					<?php printf( __( 'You tried going to %1$s, and it doesn\'t exist. All is not lost! You can search for what you\'re looking for.', 'infusion' ), '<code>' . site_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
				</p>

				<?php get_search_form(); // Loads the searchform.php template. ?>

			</div><!-- .entry-content -->

		</div><!-- .hentry -->

	</div><!-- #content -->

<?php get_footer(); ?>