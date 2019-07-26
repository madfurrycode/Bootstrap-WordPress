<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootstrap_WordPress
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comment-container">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$bootstrapwp_comment_count = get_comments_number();
			if ( '1' === $bootstrapwp_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'bootstrapwp' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $bootstrapwp_comment_count, 'comments title', 'bootstrapwp' ) ),
					number_format_i18n( $bootstrapwp_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->


		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bootstrapwp' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
			$bootstrapwp_comment_field = '<div class="form-group"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="'. esc_attr__('Enter your comment...*', 'wp-bootstrap-4') .'"></textarea></div>';
			$bootstrapwp_fields =  array(
				'author' => '<div class="form-group"><input id="author" placeholder="'. esc_attr__('Name *', 'wp-bootstrap-4') .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" class="form-control" required /></div>',
				'email'  => '<div class="form-group"><input id="email" placeholder="'. esc_attr__('Email *', 'wp-bootstrap-4') .'" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .'" size="30" class="form-control" required /></div>',
				'url'    => '<div class="form-group"><input id="url" placeholder="'. esc_attr__('Website', 'wp-bootstrap-4') .'" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" class="form-control" /></div>',
				'cookies' => '<div class="custom-control custom-checkbox form-group"><input id="cookie" name="cookie" type="checkbox" class="custom-control-input" /><label for="cookie" class="custom-control-label">Save my name, email, and website in this browser for the next time I comment.</label></div>',
			);
		comment_form( array(
			'title_reply_before'   => '<h5 class="reply-title">',
			'title_reply_after'    => '</h5>',
			'title_reply'          => esc_html__('Leave a Reply', 'wp-bootstrap-4'),
			'cancel_reply_link'    => esc_html__('Cancel', 'wp-bootstrap-4'),
			'label_submit'         => esc_html__('Post Comment', 'wp-bootstrap-4'),
			'class_submit'         => 'btn btn-block btn-primary',
			'submit_field'         => '<div class="form-group">%1$s %2$s</div>',
			'cancel_reply_before'  => '<small class="wb-cancel-reply">',
			'class_form'           => 'comment-form',
			'comment_notes_before' => '<div class="text-muted"><p>Your email address will not be published. Required fields are marked *</p></div>',
			'comment_notes_after'  => '',
			'comment_field'        => $bootstrapwp_comment_field,
			'fields'               => $bootstrapwp_fields,
		) );
	?>

</div><!-- #comments -->
