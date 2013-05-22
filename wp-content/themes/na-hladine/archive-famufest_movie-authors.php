<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Archive Template
 */

get_header(); ?>

<div id="content" class="content-archive">

    <?php get_template_part( 'archive-famufest_movie-authors-header' ); ?>

	<?php if (have_posts()) : ?>
                    
        <?php

        $authors = array();
        while (have_posts()) {
            the_post();

            $authors[rwmb_meta( 'famufest_movie_author_name' )] = rwmb_meta( 'famufest_movie_author_email' );
        }

        ksort($authors);

        foreach ($authors as $name=>$email):
        ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <span class="movie-author-name"><?php echo $name; ?></span>
                <span class="movie-author-email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>

			</article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php
        endforeach;

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts-archive' );

	endif; 
	?>  
      
</div><!-- end of #content-archive -->
        
<?php get_footer(); ?>
