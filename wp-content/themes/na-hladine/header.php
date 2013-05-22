<?php
/**
* Author: Jaroslav Hejlek
* Version: 1.0
*
* The Header.
*
* Displays all of the <head> section and everything up till <div id="main">
*
* @package WordPress
* @subpackage Famufest
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript">
		var naHladineLang = '<?php echo ICL_LANGUAGE_CODE; ?>';
		var naHladineThemeDirectory = '<?php echo get_template_directory_uri(); ?>';
		var naHladineFrontPage = false;
	</script>
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<i class="main-icon icon home-icon">&nbsp;</i>
		<div id="top">
			<header id="headline" class="site-header" role="banner">
				<hgroup>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><br />
						<?php bloginfo( 'description' ); ?><br />
						<?php echo __('13 - 16|11|2013', 'Famufest 2013'); ?><br />
						<small class="languages">
							<?php foreach (nahladine_languages() as $id => $lang): ?>
								<a href="<?php echo $lang['url']; ?>" title="<?php echo $lang['nativeName']; ?>" class="<?php echo $lang['isCurrent'] ? 'active' : ''; ?>"><?php echo $lang['id']; ?></a>
							<?php endforeach; ?>
						</small>
					</h1>
				</hgroup>
			</header>
			<div class="top-bg">
				<img src="<?php echo get_template_directory_uri(); ?>/img/duck-top.png" alt="Top of Duck on water" class="background top" />
				<img src="<?php echo get_template_directory_uri(); ?>/img/f-top.png" alt="News" class="logo top" title="<?php _e('News', 'famufesttheme'); ?>"/>
			</div>
			<div id="news"></div>
		</div>
		<div id="bottom">
			<footer role="footer" class="<?php echo is_front_page() ? 'visible' : ''; ?>">
				<div class="bottom-bg">
					<img src="<?php echo get_template_directory_uri(); ?>/img/duck-bottom.png" alt="Top of Duck on water" class="background top" />
					<img src="<?php echo get_template_directory_uri(); ?>/img/f-bottom.png" alt="News" class="logo bottom clickable" title="<?php _e('Menu', 'famufesttheme'); ?>"/>
				</div>
				<div class="partners">
					<?php
					if ( dynamic_sidebar('partners-sidebar') ) :
					else :
						?>
					<?php endif; ?>
				</div>
				<div class="copyright">
					<?php
					if ( dynamic_sidebar('copyright-sidebar') ) :
					else :
						?>
					<?php endif; ?>
				</div>
			</footer>
			<div id="main" class="<?php echo is_front_page() ? 'hidden-content' : ''; ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/duck-bottom-white.png" alt="Top of Duck on water" class="background top" />
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'famufesttheme' ); ?></h3>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'famufesttheme' ); ?>"><?php _e( 'Skip to content', 'famufesttheme' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav>