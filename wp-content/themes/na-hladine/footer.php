<?php
/**
 * Author: Jaroslav Hejlek
 * Version: 1.0
 *
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Famufest
 */
?>
			</div><!-- #main -->
		</div><!-- #bottom -->
	</div>
	<?php wp_footer(); ?>
	<i class="main-icon icon menu-icon"><?php echo __('Menu', 'famufesttheme'); ?></i>
	<i class="main-icon icon news-icon"><?php echo __('News', 'famufesttheme'); ?></i>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/behavior.min.js" type="text/javascript"></script>
	<div class="fb-data">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/cs_CZ/all.js#xfbml=1&appId=478034385602193";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
	</div>
</body>
</html>