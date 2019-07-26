<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bootstrap_WordPress
 */

if ( ! function_exists( 'bootstrapwp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bootstrapwp_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Entry Footer meta
 */

if ( ! function_exists( 'bootstrapwp_entry_footer_meta' ) ) :
	function bootstrapwp_entry_footer_meta()
	{
		/**
		 * Category
		 */
		 if ( 'post' === get_post_type() ) {
 			$categories_list = get_the_category_list( esc_html__( ', ', 'bootstrapwp' ) );
 			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bootstrapwp' ) );
 		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'bootstrapwp' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'bootstrapwp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
			echo '<span class="author-link"><i class="far fa-user mr-2"></i>'.$byline.'</span>';
			echo '<span class="date-link ml-3"><i class="far fa-clock mr-2"></i>'.$posted_on.'</span>';
			echo '<span class="cat-link ml-3"><i class="far fa-folder mr-2"></i>'.$categories_list.'</span>';
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
  			echo '<span class="comment-link ml-3"><i class="far fa-comments mr-2"></i>';
  			comments_popup_link(
  				sprintf(
  					wp_kses(
  						/* translators: %s: post title */
  						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bootstrapwp' ),
  						array(
  							'span' => array(
  								'class' => array(),
  							),
  						)
  					),
  					get_the_title()
  				)
  			);
  			echo '</span>';
  		}
			edit_post_link(
  			sprintf(
  				wp_kses(
  					/* translators: %s: Name of current post. Only visible to screen readers */
  					__( ' Edit<span class="screen-reader-text">%s</span>', 'bootstrapwp' ),
  					array(
  						'span' => array(
  							'class' => array(),
  						),
  					)
  				),
  				get_the_title()
  			),
  			'<span class="edit-link"><i class="far fa-edit"></i>',
  			'</span>'
  		);
	}
endif;
