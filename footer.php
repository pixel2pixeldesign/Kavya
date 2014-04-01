<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kavya
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
    	<?php if ( of_get_option('credit1', true) == 0 ) { ?>
		<div class="site-info">
        	<?php do_action( 'kavya_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kavya' ) ); ?>"><?php printf( __( 'Proudly Powered by %s', 'kavya' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme %1$s by %2$s', 'kavya' ), 'Kavya', '<a href="'. esc_url( 'http://pixel2pixeldesign.com') .'" rel="designer">Pixel2PixelDesign.com</a>' ); ?>
		</div><!-- .site-info -->
        <?php } //endif ?> 
        <div id="footertext">
        	<?php if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
			 	echo of_get_option('footertext2', true); } ?>
        </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
