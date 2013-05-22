<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
/* Template Name: News Page
 *
 *
 * @file           news.php
 * @package        Famufest 2013
 * @author         Jaroslav Hejlek
 * @copyright      20013 - 2013 Jaroslav Hejlek
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/index.php
 */

global $paged;
$news_query_vars = apply_filters(
    'news_query_vars',
    array(
        'posts_per_page'=>get_option('posts_per_page'),
        'paged'=>$paged
    )
);

$news_query = new WP_Query($news_query_vars);

get_header(); ?>

<div id="content" class="grid col-620">
        
	<?php if ($news_query->have_posts()) : ?>

		<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php get_template_part( 'post-meta-page' ); ?>
				
				<div class="post-entry">
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_content(__('Read more &#8250;', 'responsive')); ?>
					<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
				</div><!-- end of .post-entry -->
				
				<?php get_template_part( 'post-data' ); ?>

			</div><!-- end of #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
