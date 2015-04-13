<?php
/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<section class="conversation">

	<?php if ( have_comments() ) : // Check if there are any comments. ?>

		<div class="comments">

			<h3 class="comments-number"><?php comments_number(); ?></h3>

				<?php wp_list_comments(
					array(
						'callback'     	=> 'hybrid_comments_callback',
						'end-callback' 	=> 'hybrid_comments_end_callback',
						'style'			=> null
					)
				); ?>

			<?php locate_template( array( 'comment/comments-nav.php' ), true );  ?>

		</div>

	<?php endif; // End check for comments. ?>

	<?php locate_template( array( 'comment/comments-error.php' ), true );  ?>

	<?php comment_form(
		array(
			'comment_notes_after' => ' ',
		)
	); ?>

</section>