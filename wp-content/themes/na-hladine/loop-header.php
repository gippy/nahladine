<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Loop Header Template-Part File
 *
 * @file           loop-header.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/loop-header.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */


/**
 * Display archive information
 */
if ( is_archive() ) {
	?>
	<h6 class="title-archive">
		<?php 
		if ( is_day() ) : 
			printf( __( 'Daily Archives: %s', 'famufesttheme' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) : 
			printf( __( 'Monthly Archives: %s', 'famufesttheme' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) : 
			printf( __( 'Yearly Archives: %s', 'famufesttheme' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		else : 
			_e( 'Blog Archives', 'responsive' ); 
		endif; 
		?>
	</h6>
	<?php
}