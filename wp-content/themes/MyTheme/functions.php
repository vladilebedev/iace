<?php
	function mytheme_setup() {

		load_theme_textdomain('mytheme');

		add_theme_support('title-tag');

		add_theme_support('custom-logo', array('height' => 70, 'width' => 360, 'flex-height' => true));

		add_theme_support('post_thumbnails');
		set_post_thumbnail_size(730,446);

		add_theme_support('html5', array('search_form', 'comment-form', 'comment_list', 'gallery', 'caption'));

		add_theme_support('post-formats', array('aside', 'image', 'video', 'gallery'));

		register_nav_menu('primary', 'Primary menu');
	}
	add_action('after_setup_theme', 'mytheme_setup');


	function mytheme_scripts() {
		wp_enqueue_style( 'style-css', get_stylesheet_uri() );
		wp_enqueue_style( 'media-css', get_template_directory_uri() . '/style/media.css');
		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/style/fonts.css');
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');

		wp_enqueue_script( 'jqu', get_template_directory_uri() . '/libs/jquery/jquery-2.1.3.min.js');
		wp_enqueue_script( 'comon', get_template_directory_uri() . '/js/common.js');
		wp_enqueue_script( 'jquery.magnific-popup.min.js', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js');
		
	}
	add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

	require_once ( get_stylesheet_directory() . '/theme-options.php' );

	add_theme_support( 'post-thumbnails' );

	// show_admin_bar(false);

 ?>
