<?php
	function enqueue_styles() {
	    wp_enqueue_style( 'style', get_stylesheet_uri());
	    wp_enqueue_style( 'concise', get_template_directory_uri() . "/css/concise.min.css");
	    wp_enqueue_style( 'pushy', get_template_directory_uri() . "/css/pushy.css");
	    wp_register_style('open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700&subset=latin,cyrillic-ext');
	    wp_enqueue_style( 'open-sans');
	}
	add_action('wp_enqueue_scripts', 'enqueue_styles');

	function enqueue_scripts () {
	    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	    wp_enqueue_script('html5-shim');

	    /*wp_register_script('jquery', 'http://code.jquery.com/jquery-2.1.4.min.js');
	    wp_enqueue_script('jquery');*/

	    wp_enqueue_script('modernizr', get_template_directory_uri() . "/" . "js/modernizr.js");

	    wp_enqueue_script('golev', get_template_directory_uri() . "/" . "js/golev.js", array('jquery'));

	    wp_enqueue_script('pushy', get_template_directory_uri() . "/" . "js/pushy.js", array('jquery'));

	    wp_enqueue_script('parallax', get_template_directory_uri() . "/" . "js/parallax.min.js", array('jquery'));

	    wp_enqueue_script('jquery-scrollto', get_template_directory_uri() . "/" . "js/jquery-scrollto.js", array('jquery'));
	}
	add_action('wp_enqueue_scripts', 'enqueue_scripts');

	function remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');

	if (function_exists('add_theme_support')) {
    	add_theme_support('menus');
	}

	if (function_exists('register_sidebar')) {
    	register_sidebar();
	}

	add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
	function custom_oembed_filter($html, $url, $attr, $post_ID) {
	    return '<div class="embed-container">'.$html.'</div><br />';
	}

	// Custom Excerpt
	function shorten_string($oldstring, $wordsreturned) {
		$result = $string;
		$string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $oldstring);
		$string = str_replace("\n", " ", $string);
		$array = explode(" ", $string);
		if (count($array) <= $wordsreturned) {
			$result = $string;
		} else {
			array_splice($array, $wordsreturned);
			$result = implode(" ", $array)."...";
		}
		return $result;
	}

	function custom_wp_trim_excerpt($text) {
	  $raw_excerpt = $text;
	  if ( '' == $text ) {
	    $text = get_the_content(''); // Original Content
	    $text = strip_shortcodes($text); // Minus Shortcodes
	    $text = apply_filters('the_content', $text); // Filters
	    $text = str_replace(']]>', ']]&gt;', $text); // Replace
	    
	    $excerpt_length = apply_filters('excerpt_length', 100); // Length
	    $text = shorten_string($text, 100);
	  }
	  return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');

	//Localization
	function loadLocalization() {
		load_theme_textdomain( 'golev', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'loadLocalization');
?>