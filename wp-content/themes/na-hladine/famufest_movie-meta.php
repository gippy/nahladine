<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Post Meta-Data Template-Part File
 *
 * @file           post-meta.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/post-meta.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<h2 class="movie-title">
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'famufesttheme'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
	<span class="author">~ <?php echo rwmb_meta( 'famufest_movie_author_name', 'Famufest 2013' ); ?></span>
</h2>