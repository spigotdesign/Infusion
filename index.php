<?php get_header(); ?>

	<div class="main">

		<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

			<?php locate_template( array( 'inc/loop-meta.php' ), true ); ?>

		<?php endif; ?>

		<div class="page-contents">

		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) :  ?>

			<?php the_post();  ?>

			<?php hybrid_get_content_template(); ?>

			<?php if ( is_singular() && !is_page() ) : ?>

				<?php comments_template( '', true ); ?>

			<?php endif; ?>

		<?php endwhile; ?>

		</div>

		<?php locate_template( array( 'inc/loop-nav.php' ), true ); ?>

		<?php else : ?>

			<?php locate_template( array( 'content/error.php' ), true ); ?>

		<?php endif; ?>

	</div>

<?php get_footer();  ?>