<?php
// Our include  
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

if (@$_GET['lang'] != '') {
	global $sitepress;
	$sitepress->switch_lang($_GET['lang'] );
}

// Our variables
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;

query_posts(array(
	 'posts_per_page' => $numPosts,
	 'paged'          => 1
));
// our loop
if (have_posts()) {
?>
<i class="icon prev-icon">&nbsp;</i>
<i class="icon next-icon">&nbsp;</i>
<div class="slides">
<?php
	while (have_posts()){
		the_post();
?>
	<article <?php post_class(); ?>>
		<?php the_post_thumbnail(); ?>
		<div class="overlay">
			<h2 class="news-title"><?php the_title(); ?></h2>
			<div class="content"><?php the_content(); ?></div>
		</div>
	</article>
<?php
	}
?>
</div>
<?php
}
wp_reset_query();
?>