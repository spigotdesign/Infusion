<?php
/**
 * Comments Template
 *
 * Lists comments and calls the comment form.  Individual comments have their own templates.  The 
 * hierarchy for these templates is $comment_type.php, comment.php.
 *
 * @package infusion
 * @subpackage Template
 * @version 1.2.2
 */

/* Kill the page if trying to access this template directly. */
if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
	die( __( 'Please do not load this page directly. Thanks!', 'infusion' ) );

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

	<div class="conversation">

		<div id="comments" class="comments">

			<?php if ( have_comments() ) : ?>

				<h3 class="comments-header"><?php comments_number( __( 'No Responses', 'infusion' ), __( 'One Response', 'infusion' ), __( '% Responses', 'infusion' ) ); ?></h3>

				<ol class="comment-list">

					<?php wp_list_comments( hybrid_list_comments_args() ); ?>
				
				</ol>

				<?php if ( get_option( 'page_comments' ) ) : ?>

					<nav class="comment-navigation comment-pagination">
						
						<?php paginate_comments_links(); ?>
					
					</nav>
				
				<?php endif; ?>

			<?php endif; ?>

			<?php if ( pings_open() && !comments_open() ) : ?>

				<p class="comments-closed pings-open">
					
					<?php printf( __( 'Comments are closed, but <a href="%1$s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'infusion' ), get_trackback_url() ); ?>
				
				</p>

			<?php elseif ( !comments_open() ) : ?>

				<p class="comments-closed">
					
					<?php _e( 'Comments are closed.', 'infusion' ); ?>
				
				</p>

			<?php endif; ?>

		</div>

		<?php comment_form(); // Loads the comment form. ?>

	</div>