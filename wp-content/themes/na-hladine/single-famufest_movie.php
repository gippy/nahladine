<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="movie">
        
	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php get_template_part( 'famufest_movie-meta' ); ?>

				<div class="photos">
                <?php
				echo the_post_thumbnail();

				$authorPhotos = rwmb_meta( 'famufest_movie_author_photo', 'type=thickbox_image' );
				foreach ($authorPhotos as $authorsPhoto):
				?>
					<img src="<?php echo $authorsPhoto['url']; ?>" class="autor" title="<?php echo $authorsPhoto['title']; ?>" alt="<?php echo $authorsPhoto['alt']; ?>" />
				<?php endforeach; ?>
					<div class="clear" />
				</div>

                <div class="movie-details">
                    <h2><?php echo __('About the movie', 'Famufest 2013'); ?> </h2>
                    <div class="movie-description"><?php the_content(__('Read more &#8250;', 'responsive')); ?></div>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_duration' );
                    if ($field):
                        ?>
                        <div class="detail faculty">
                            <span class="label"><?php echo __('Duration', 'Famufest 2013'); ?></span>
                            <span class="data"><?php echo $field; ?></span>
                            <span><?php echo __('minutes', 'Famufest 2013'); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php
                        $field = rwmb_meta( 'famufest_movie_faculty' );
                        if ($field):
                    ?>
                    <div class="detail faculty">
                        <span class="label"><?php echo __('Faculty', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_year' );
                    if ($field):
                    ?>
                    <div class="detail year">
                        <span class="label"><?php echo __('Made in year', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_exercise' );
                    if ($field):
                    ?>
                    <div class="detail exercise">
                        <span class="label"><?php echo __('Type of exercise', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_director' );
                    if ($field):
                    ?>
                    <div class="detail director">
                        <span class="label"><?php echo __('Director', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                        $field = rwmb_meta( 'famufest_movie_screenplay' );
                        if ($field):
                    ?>
                    <div class="detail screenwriter">
                        <span class="label"><?php echo __('Screenwriter', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_camera' );
                    if ($field):
                    ?>
                    <div class="detail camera">
                        <span class="label"><?php echo __('Camera', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_editor' );
                    if ($field):
                    ?>
                    <div class="detail editor">
                        <span class="label"><?php echo __('Film Editor', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_sound' );
                    if ($field):
                    ?>
                    <div class="detail sound">
                        <span class="label"><?php echo __('Sound', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = rwmb_meta( 'famufest_movie_producer' );
                    if ($field):
                    ?>
                    <div class="detail producer">
                        <span class="label"><?php echo __('Producer', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>

                    <?php
                    $field = implode( ', ', rwmb_meta( 'famufest_movie_actors' ) );
                    if ($field):
                    ?>
                    <div class="detail actors">
                        <span class="label"><?php echo __('Actors', 'Famufest 2013'); ?></span>
                        <span class="data"><?php echo $field; ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="other-movies">
			        <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
                    <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
		        </div><!-- end of .navigation -->

			</article><!-- end of #post-<?php the_ID(); ?> -->
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
