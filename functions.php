<?php

/*
		=====================================
			Include scripts
		=====================================
*/

		function learning_script_enqueue() {
	//css
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.1', 'all' );
			wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/learning.css', array(), '1.0.0', 'all' );
	//js
			wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '3.1.1', true );
			wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '4.1.1', true );
			wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/learning.js', array(), '1.0.0', true );

		}

		add_action( 'wp_enqueue_scripts', 'learning_script_enqueue' );

/*
	=====================================
		Include menus
	=====================================
*/
	function learning_theme_setup() {

		add_theme_support( 'menus' );

		register_nav_menu( 'primary', 'Primary Header Navigation' );
		register_nav_menu( 'secondary', 'Footer Navigation' );

	}

	add_action( 'init', 'learning_theme_setup' );

/*
	=====================================
		Theme support function
	=====================================
*/
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video' ) );

/*
	=====================================
		Sidebar function
	=====================================
*/
	function learning_widget_setup() {

		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar-1',
			'class' => 'custom',
			'description' => 'Standard sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
		);			
	}

	add_action( 'widgets_init', 'learning_widget_setup');