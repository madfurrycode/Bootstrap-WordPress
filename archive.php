<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootstrap_WordPress
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-lg-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header page-container">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description"><small>', '</small></div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="col-sm-12 col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php

get_footer();
