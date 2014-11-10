<?php
/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<section id="conversation">

	<?php if ( have_comments() ) : // Check if there are any comments. ?>

		<div class="comments">

			<h3 id="comments-number"><?php comments_number(); ?></h3>

			<ol class="comment-list">
				<?php wp_list_comments(
					array(
						'callback'     => 'hybrid_comments_callback',
						'end-callback' => 'hybrid_comments_end_callback'
					)
				); ?>
			</ol><!-- .comment-list -->

			<?php locate_template( array( 'comment/comments-nav.php' ), true );  ?>

		</div><!-- #comments-->

	<?php endif; // End check for comments. ?>

	<?php locate_template( array( 'comment/comments-error.php' ), true );  ?>

	<?php comment_form(
		array(
			'comment_notes_after' => ' ',
		)
	); ?>

</section><!-- #comments-template -->