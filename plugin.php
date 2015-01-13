<?php
/**
 * @package WP TF Font Changer
 */

/*
Plugin Name: WP TF Font Changer
Plugin URI: http://wordpress.org/plugins/WP-TF-Font-Changer
Description: Change your theme's fonts.
Author: Benjamin Intal
Version: 0.1
*/


/**
 * Include Titan Framework checker. I didn't want to embed the whole framework here,
 * so just include the TF checker. This does the heavy lifting of adding notices
 * in the admin to install or activate TF.
 * @see https://github.com/gambitph/Titan-Framework/blob/master/titan-framework-checker.php
 */
require_once( 'titan-framework-checker.php' );


/**
 * Initialize Titan & options here
 * @see http://www.titanframework.net/get-started/
 */
add_action( 'tf_create_options', 'font_changer_create_options' );
function font_changer_create_options() {

	$titan = TitanFramework::getInstance( 'WP_TF_Font_Changer' );
	
	/**
	 * Create a Theme Customizer panel where we can edit some options.
	 * You should put options here that change the look of your theme.
	 */
	
	$section = $titan->createThemeCustomizerSection( array(
	    'name' => 'colors',
	) );
	
	// Create our heading font changer
	$section->createOption( array(
	    'name' => 'Heading Font',
	    'id' => 'headings',
	    'type' => 'font',
		// Hide the rest of the options, we only want to change the font-family
		'show_color' => false,
		'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-family' => 'Playfair Display',
	    ),
		// This line generates our CSS that does the actual font changing. Live Preview is also handled pretty well.
		'css' => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .site-title, .widget-title { value }',
	) );
	
	// Create our body font changer
	$section->createOption( array(
	    'name' => 'Body Font',
	    'id' => 'body',
	    'type' => 'font',
		// Hide the rest of the options, we only want to change the font-family
		'show_color' => false,
		'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-family' => 'Fauna One',
	    ),
		// This line generates our CSS that does the actual font changing. Live Preview is also handled pretty well.
		'css' => 'html, body, div, span, applet, object, iframe, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td { value }',
	) );
	
	/**
	 * That's all there is. TF does the CSS generation / caching for us so all we have 
	 * to worry about is the option creation.
	 */
}