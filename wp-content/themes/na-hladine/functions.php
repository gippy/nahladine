<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

if ( ! function_exists( 'nahladine_setup' ) ){
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * @since Shape 1.0
	 */
	function nahladine_setup() {

		/**
		 * Custom template tags for this theme.
		 */
		require( get_template_directory() . '/inc/template-tags.php' );

		/**
		 * Custom functions that act independently of the theme templates
		 */
		require( get_template_directory() . '/inc/tweaks.php' );

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on Shape, use a find and replace
		 * to change 'shape' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'famufesttheme', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for the Aside Post Format
		 */
		add_theme_support( 'post-formats', array( 'aside' ) );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
								 'primary' => __( 'Primary Menu', 'famufesttheme' ),
							) );
	}
}
add_action( 'after_setup_theme', 'nahladine_setup' );

function nahladine_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'nahladine_scripts' );

function nahladine_special_nav_class($classes, $item){
	$link = site_url().$_SERVER['REQUEST_URI'];

	if ( strpos($link, 'movies') && strpos($item->url, 'movies') ){
		if ( strpos( $link, $item->url ) !== false){
			global $wpdb;

			$has_children = $wpdb->get_var( "SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );

			if ( $has_children > 0 ) {
				$classes[] = 'current-menu-ancestor';
			} else {
				$childs = explode('/',substr(str_replace($item->url,'',$link),1,-1));
				if ( ( count($childs) == 1 ) && ( strlen($childs[0]) == 1) ) $classes[] = 'current-menu-item';
			}
		}
	}
	if ( strpos($link, 'authors') && strpos($item->url, 'authors') ){
		if ( strpos( $link, $item->url ) !== false){
			$classes[] = 'current-menu-item';
		}
	}
	if ( strpos($link, 'authors') && strpos($item->url, 'movies') ){
		if ( $item->menu_item_parent == 0 )	$classes[] = 'current-menu-ancestor';
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'nahladine_special_nav_class' , 10 , 2);

/**
 * WordPress Widgets start right here.
 */
function nahladine_widgets_init() {

	register_sidebar(array(
		  'name' => __('Copyright Sidebar', 'famufesttheme'),
		  'description' => __('Copyright - sidebar.php', 'famufesttheme'),
		  'id' => 'copyright-sidebar',
		  'before_title' => '<div class="widget-title">',
		  'after_title' => '</div>',
		  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		  'after_widget' => '</div>'
	));

	register_sidebar(array(
						  'name' => __('Partners Sidebar', 'famufesttheme'),
						  'description' => __('Partners - sidebar.php', 'famufesttheme'),
						  'id' => 'partners-sidebar',
						  'before_title' => '<div class="widget-title">',
						  'after_title' => '</div>',
						  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
						  'after_widget' => '</div>'
					 ));
}
add_action('widgets_init', 'nahladine_widgets_init');


function nahladine_get_correct_url($url, $lang, $isCurrent){
	$realCurrentURL = site_url().$_SERVER['REQUEST_URI'];
	if ($isCurrent && $realCurrentURL != $url) $url = $realCurrentURL;
	else if ( ! $isCurrent && ( strpos($realCurrentURL, 'movies') !== false ) ){
		$url = site_url();
		$request = $_SERVER['REQUEST_URI'];

		if (strpos($request, 'famufest') !== false){
			$request = substr($request, 9);
		}

		if ($lang == 'en'){
			$url .= '/en';
			$request = str_replace('nesoutezni', 'not-in-contest', $request);
			$request = str_replace('soutezni', 'in-contest', $request);
		} else {
			$request = substr($request,3);
			$request = str_replace('not-in-contest', 'nesoutezni', $request);
			$request = str_replace('in-contest', 'soutezni', $request);

		}
		$url .= $request;
	} else if ( ! $isCurrent && ( strpos($realCurrentURL, 'authors') !== false ) ) {
		$url = site_url();
		$request = $_SERVER['REQUEST_URI'];

		if (strpos($request, 'famufest') !== false){
			$request = substr($request, 9);
		}

		if ($lang == 'en'){
			$url .= '/en';
		} else {
			$request = substr($request,3);
		}
		$url .= $request;
	}
	return $url;
}
function nahladine_languages(){
	$languages = icl_get_languages('skip_missing=0');
	$langData = array();
	$currentLanguage = ICL_LANGUAGE_CODE;
	foreach($languages as $id=>$language){
		$lang = array();
		$lang['isCurrent'] = $id == $currentLanguage;
		$lang['translatedName'] = $language['translated_name'];
		$lang['nativeName'] = $language['native_name'];
		$lang['url'] = nahladine_get_correct_url($language['url'], $id, $lang['isCurrent']);
		$lang['id'] = $id == 'cs' ? 'cz' : $id;
		$langData[$id] = $lang;
	}
	return $langData;
}
