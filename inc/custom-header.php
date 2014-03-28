<?php
/**
 * @package Kavya
 * Setup the WordPress core custom header feature.
 *
 * @uses kavya_header_style()
 * @uses kavya_admin_header_style()
 * @uses kavya_admin_header_image()

 */
function kavya_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-image'          => get_template_directory_uri().'/images/tracks.jpg',
		'default-text-color'     => 'fff',
		'width'                  => 1600,
		'height'                 => 300,
		'wp-head-callback'       => 'kavya_header_style',
		'admin-head-callback'    => 'kavya_admin_header_style',
		'admin-preview-callback' => 'kavya_admin_header_image',
	) );
}
add_action( 'after_setup_theme', 'kavya_custom_header_setup' );

if ( ! function_exists( 'kavya_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kavya_custom_header_setup().
 */
function kavya_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; 
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		#header-image {
			background: url(<?php echo get_header_image(); ?>) no-repeat #111;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // kavya_header_style

if ( ! function_exists( 'kavya_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see kavya_custom_header_setup().
 */
function kavya_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
			</style>
<?php
}
endif; // kavya_admin_header_style

if ( ! function_exists( 'kavya_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see kavya_custom_header_setup().
 */
function kavya_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // kavya_admin_header_image
