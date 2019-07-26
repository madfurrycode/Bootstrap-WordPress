<?php
/*
* Template Name: Contact Page
*/

get_header();
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <div id="primary" class="content-area">
        <main id="main" class="site-main contact-form-container">

        <?php
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content/content', 'page' );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>

        </main><!-- #main -->
      </div><!-- #primary -->
    </div>
  </div>
</div>
<?php
get_footer();
