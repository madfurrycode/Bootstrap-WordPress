<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_WordPress
 */

?>

	</div><!-- #content -->
	<footer class="site-footer">
	  <div class="widget-footer-container">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-4"><?php dynamic_sidebar( 'footer-1' ); ?></div>
	        <div class="col-lg-4"><?php dynamic_sidebar( 'footer-2' ); ?></div>
	        <div class="col-lg-4"><?php dynamic_sidebar( 'footer-3' ); ?></div>
	      </div>
	    </div>
	  </div>
	  <div class="site-info">
			<div class="container">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bootstrapwp' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'bootstrapwp' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'bootstrapwp' ), 'bootstrapwp', '<a href="http://tristanelliott.co.za">Tristan Elliott</a>' );
					?>
			</div>
	  </div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
