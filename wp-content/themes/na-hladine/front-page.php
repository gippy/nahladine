<?php

/**
 * Site Front Page
 */

wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.js', array('jquery'), '3.0.2', true);

	get_header();
	?>
	<script type="text/javascript">naHladineFrontPage = true;</script>
	<?php 
	//get_sidebar('home');
	get_footer();
?>