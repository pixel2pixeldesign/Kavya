<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'kavya'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	
	$options = array();
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';	
	
	// Layout Settings Tab
	$options[] = array(
		'name' => __('Layout Settings', 'kavya'),
		'type' => 'heading');
	
	$options[] = array(
		'name' =>  __('Upload Custom Logo', 'kavya'),
		'desc' => __('Upload the custom logo image', 'kavya'),
		'id' => 'custom_logo',
		'std' => '',
		'type' => 'upload' );

	$options[] = array(
		'name' => "Sidebar Layout",
		'desc' => "Select Layout for Posts & Pages.",
		'id' => "sidebar-layout",
		'std' => "right",
		'type' => "images",
		'options' => array(
			'1col' => $imagepath . '1col.png',
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' => __('Custom CSS', 'kavya'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'kavya'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
	
	$options[] = array(
		'name' => __('Copyright Text', 'kavya'),
		'desc' => __('Some Text regarding copyright of your site, you would like to display in the footer.', 'kavya'),
		'id' => 'footertext2',
		'std' => '',
		'type' => 'text');
		
	
	//Social Settings
	
	$options[] = array(
		'name' => __('Social Settings', 'kavya'),
		'type' => 'heading');
	
	$options[] = array(
		'desc' => __('Please set the value of following fields, as per the instructions given along. If you do not want to use an icon, just leave it blank. If some icons are showing up, even when no value is set then make sure they are completely blank, and just save the options once. They will not be shown anymore.', 'kavya'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Facebook', 'kavya'),
		'desc' => __('Facebook Profile or Page URL i.e. http://facebook.com/username/ ', 'kavya'),
		'id' => 'facebook',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter', 'kavya'),
		'desc' => __('Twitter Username', 'kavya'),
		'id' => 'twitter',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Google Plus', 'kavya'),
		'desc' => __('Google Plus profile url, including "http://"', 'kavya'),
		'id' => 'google',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Youtube', 'kavya'),
		'desc' => __('Youtube profile url, including "http://"', 'kavya'),
		'id' => 'youtube',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Pinterest', 'kavya'),
		'desc' => __('URL of your Pinterest Profile', 'kavya'),
		'id' => 'pinterest',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Instagram', 'kavya'),
		'desc' => __('URL of your Instagram Profile', 'kavya'),
		'id' => 'instagram',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('LinkedIn', 'kavya'),
		'desc' => __('URL of your LinkedIn Profile', 'kavya'),
		'id' => 'linkedin',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Flickr', 'kavya'),
		'desc' => __('URL for your Flickr Profile', 'kavya'),
		'id' => 'flickr',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Dribble', 'kavya'),
		'desc' => __('URL for your Dribble Profile', 'kavya'),
		'id' => 'dribble',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
			
	$options[] = array(
		'name' => __('Feedburner', 'kavya'),
		'desc' => __('URL for your RSS Feeds', 'kavya'),
		'id' => 'feedburner',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
	'name' => __('Support', 'kavya'),
	'type' => 'heading');
	
	$options[] = array(
		'desc' => __('Kavya WordPress theme has been Designed and Created by <a href="http://pixel2pixeldesign.com" target="_blank">Suresh Patel</a>. For any Queries or help regarding this theme, <a href="http://wordpress.org/support/theme/kavya" target="_blank">use our support forum.</a>', 'kavya'),
		'type' => 'info');	
		
	$options[] = array(
		'desc' => __('<a href="http://twitter.com/suresh_p12" target="_blank">Follow Me on Twitter</a> to know about my upcoming themes.', 'kavya'),
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Live Demo Blog', 'kavya'),
		'desc' => __('I have created a  <a href="#" target="_blank">Live Demo Blog</a> of this theme so that you know how it will look once ready.'),
		'std' => '',
		'type' => 'info');	
	
	$options[] = array(
		'name' => __('Regenerating Post Thumbnails', 'kavya'),
		'desc' => __('If you are using Kavya Theme on a New Wordpress Installation, then you can skip this section.<br />But if you have just switched to this theme from some other theme, or just updated to the current version of Kavya, then you are requested regenerate all the post thumbnails. It will fix all the isses you are facing with distorted & ugly homepage thumbnail Images. ', 'kavya'),
		'type' => 'info');	
		
	$options[] = array(
		'desc' => __('To Regenerate all Thumbnail images, Install and Activate the <a href="http://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a> WP Plugin. Then from <strong>Tools &gt; Regen. Thumbnails</strong>, re-create thumbnails for all your existing images. And your blog will look even more stylish with Kavya theme.<br /> ', 'kavya'),
		'type' => 'info');	
		
			
	$options[] = array(
		'desc' => __('<strong>Note:</strong> Regenerating the thumbnails, will not affect your original images. It will just generate a separate image file for those images.', 'kavya'),
		'type' => 'info');	
		
	
	$options[] = array(
		'name' => __('Theme Credits', 'kavya'),
		'desc' => __('Check this if you do not want to give us credit in your site footer.', 'kavya'),
		'id' => 'credit1',
		'std' => '0',
		'type' => 'checkbox');

	return $options;
}