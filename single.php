<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bootstrap_WordPress
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', get_post_type() );


					?>
						<div class="post-nav-container">
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="post-link-nav text-left">
										<span class="fas fa-chevron-left mr-2"></span>
										<?php next_post_link(); ?>
									</div>
								</div>
								<div class="col-sm-12 col-md-6">
									<div class="post-link-nav text-right">
										<?php previous_post_link(); ?>
										<span class="fas fa-chevron-right ml-2"></span>
									</div>
								</div>
							</div>
						</div>
					<?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="col-sm-12 col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php

get_footer();
