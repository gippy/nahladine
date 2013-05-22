<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 *
 */

get_header(); ?>

<div id="content" class="content-archive">

    <?php get_template_part( 'archive-famufest_movie-header' ); ?>

	<?php if (have_posts()) : ?>
                    
        <?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_title() ?></a>

                <span class="movie-author"> - <?php echo rwmb_meta( 'famufest_movie_author_name' ) ?> </span>

			</article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else :

		get_template_part( 'loop-no-posts-archive' );

	endif;
	?>
</div>
        
<?php get_footer(); ?>
