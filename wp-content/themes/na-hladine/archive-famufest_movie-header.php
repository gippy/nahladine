<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Famufest Movie Archive Header Template
 */

$letters = array('num', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
    'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

global $wp_query;
$activeLetter = @$wp_query->query_vars['letter'];
?>
<div class="archive-filters">
    <h2><?php echo __('Filter by alphabet', 'Famufest 2013'); ?></h2>
    <ul>
        <li class="letter-all <?php echo $activeLetter == null ? 'active' : ''; ?>">
            <a href="<?php echo $activeLetter != null ? '../' : './'; ?>"><?php echo __('All', 'Famufest 2013'); ?></a>
        </li>
    <?php
        foreach ( $letters as $letter ):
            $class = 'letter-' . $letter . ' ' . ($activeLetter == $letter ? 'active' : '');
            $path = ($activeLetter == null ? './' : '../') . $letter . '/';
            $label = $letter != 'num' ? strtoupper($letter) : '#';
    ?>
        <li class="<?php echo $class; ?>">
            <a href="<?php echo $path; ?>"><?php echo $label; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>


