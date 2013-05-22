<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * No-Posts Loop Content Template-Part File
 *
 * @file           loop-no-posts.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-no-posts.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

/**
 * If there are no posts in the loop,
 * display default content
 */ 
$title = ( is_archive() ? __('This category does not contain any entries.', 'famufesttheme' ) : __( '404 &#8212; Fancy meeting you here!', 'famufesttheme' ) );
?>

<p><?php echo $title; ?></p>