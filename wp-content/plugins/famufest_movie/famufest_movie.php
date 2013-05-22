<?php
/*
Plugin Name: Famufest Movie Type
Plugin URI: http://gipsweb.com/wordpress/famufest_movie
Description: A plugin which adds Custom Post Type - Movie
Version: 1.0
Author: Jaroslav Hejlek
Author URI: http://gipsweb.cz
License: GPL2
*/

function famufest_alphabet_taxonomy()  {
    $labels = array(
        'name'                       => _x( 'Letters', 'Taxonomy General Name', 'Famufest Alphabet Taxonomy' ),
        'singular_name'              => _x( 'Letter', 'Taxonomy Singular Name', 'Famufest Alphabet Taxonomy' ),
        'menu_name'                  => __( 'Letters', 'Famufest Alphabet Taxonomy' ),
        'all_items'                  => __( 'All Letters', 'Famufest Alphabet Taxonomy' ),
        'parent_item'                => __( 'Parent Letter', 'Famufest Alphabet Taxonomy' ),
        'parent_item_colon'          => __( 'Parent Letter:', 'Famufest Alphabet Taxonomy' ),
        'new_item_name'              => __( 'New Letter', 'Famufest Alphabet Taxonomy' ),
        'add_new_item'               => __( 'Add New Letter', 'Famufest Alphabet Taxonomy' ),
        'edit_item'                  => __( 'Edit Letter', 'Famufest Alphabet Taxonomy' ),
        'update_item'                => __( 'Update Letter', 'Famufest Alphabet Taxonomy' ),
        'separate_items_with_commas' => __( 'Separate letters with commas', 'Famufest Alphabet Taxonomy' ),
        'search_items'               => __( 'Search letters', 'Famufest Alphabet Taxonomy' ),
        'add_or_remove_items'        => __( 'Add or remove letters', 'Famufest Alphabet Taxonomy' ),
        'choose_from_most_used'      => __( 'Choose from the most used letters', 'Famufest Alphabet Taxonomy' ),
    );

    $rewrite = array(
        'slug'                       => 'letter',
        'with_front'                 => false,
        'hierarchical'               => false,
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => false,
        'show_ui'                    => false,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'query_var'                  => 'letter',
        'rewrite'                    => $rewrite,
    );

    register_taxonomy( 'famufest_alphabet', 'famufest_movie', $args );
}

function famufest_authors_alphabet_taxonomy()  {
    $labels = array(
        'name'                       => _x( 'Author Letters', 'Taxonomy General Name', 'Famufest Alphabet Taxonomy' ),
        'singular_name'              => _x( 'Author Letter', 'Taxonomy Singular Name', 'Famufest Alphabet Taxonomy' ),
        'menu_name'                  => __( 'Author Letters', 'Famufest Alphabet Taxonomy' ),
        'all_items'                  => __( 'All Letters', 'Famufest Alphabet Taxonomy' ),
        'parent_item'                => __( 'Parent Letter', 'Famufest Alphabet Taxonomy' ),
        'parent_item_colon'          => __( 'Parent Letter:', 'Famufest Alphabet Taxonomy' ),
        'new_item_name'              => __( 'New Letter', 'Famufest Alphabet Taxonomy' ),
        'add_new_item'               => __( 'Add New Letter', 'Famufest Alphabet Taxonomy' ),
        'edit_item'                  => __( 'Edit Letter', 'Famufest Alphabet Taxonomy' ),
        'update_item'                => __( 'Update Letter', 'Famufest Alphabet Taxonomy' ),
        'separate_items_with_commas' => __( 'Separate letters with commas', 'Famufest Alphabet Taxonomy' ),
        'search_items'               => __( 'Search letters', 'Famufest Alphabet Taxonomy' ),
        'add_or_remove_items'        => __( 'Add or remove letters', 'Famufest Alphabet Taxonomy' ),
        'choose_from_most_used'      => __( 'Choose from the most used letters', 'Famufest Alphabet Taxonomy' ),
    );

    $rewrite = array(
        'slug'                       => 'author-letter',
        'with_front'                 => false,
        'hierarchical'               => false,
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => false,
        'show_ui'                    => false,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'query_var'                  => 'author_letter',
        'rewrite'                    => $rewrite,
    );

    register_taxonomy( 'famufest_authors_alphabet', 'famufest_movie', $args );
}

function famufest_movie() {
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'Famufest Movie' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'Famufest Movie' ),
        'menu_name'           => __( 'Movies', 'Famufest Movie' ),
        'parent_item_colon'   => __( 'Parent Movie:', 'Famufest Movie' ),
        'all_items'           => __( 'All Movies', 'Famufest Movie' ),
        'view_item'           => __( 'View Movie', 'Famufest Movie' ),
        'add_new_item'        => __( 'Add New Movie', 'Famufest Movie' ),
        'add_new'             => __( 'New Movie', 'Famufest Movie' ),
        'edit_item'           => __( 'Edit Movie', 'Famufest Movie' ),
        'update_item'         => __( 'Update Movie', 'Famufest Movie' ),
        'search_items'        => __( 'Search movies', 'Famufest Movie' ),
        'not_found'           => __( 'No movies found', 'Famufest Movie' ),
        'not_found_in_trash'  => __( 'No movies found in Trash', 'Famufest Movie' ),
    );

    $rewrite = array(
        'slug'                => 'movie',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );

    $args = array(
        'label'               => __( 'Famufest Movie', 'Famufest Movie' ),
        'description'         => __( 'Post type for movies played during Famufest Film Festival.', 'Famufest Movie' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'          => array( 'category', 'famufest_alphabet', 'famufest_authors_alphabet' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => null,
        'can_export'          => true,
        'has_archive'         => 'movies',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );

    register_post_type( 'famufest_movie', $args );
}

function famufest_movie_init(){
    famufest_alphabet_taxonomy();
    famufest_authors_alphabet_taxonomy();
    famufest_movie();
}
add_action( 'init', 'famufest_movie_init', 0 );

function famufest_movie_activate() {
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'famufest_movie_activate' );

function famufest_movie_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'famufest_movie_deactivate' );


function famufest_movie_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['famufest_movie'] = array(
        0 => '',
        1 => sprintf( __('Movie updated. <a href="%s">View movie</a>', 'Famufest Movie'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.', 'Famufest Movie'),
        3 => __('Custom field deleted.', 'Famufest Movie'),
        4 => __('Movie updated.', 'Famufest Movie'),
        5 => isset($_GET['revision']) ? sprintf( __('Movie restored to revision from %s', 'Famufest Movie'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Movie published. <a href="%s">View movie</a>', 'Famufest Movie'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Movie saved.', 'Famufest Movie'),
        8 => sprintf( __('Movie submitted. <a target="_blank" href="%s">Preview event</a>', 'Famufest Movie'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Movie scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview movie</a>', 'Famufest Movie'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Movie draft updated. <a target="_blank" href="%s">Preview movie</a>', 'Famufest Movie'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
}
add_filter( 'post_updated_messages', 'famufest_movie_updated_messages' );

function famufest_movie_contextual_help( $contextual_help, $screen_id, $screen ) {
    if ( 'famufest_movie' == $screen->id ) {

        $contextual_help = '<h2>Editing movies</h2>
		<p>This page allows you to view/modify movie details. Please make sure to fill out the available boxes with the appropriate details and do <strong>not</strong> add these details to the text about the movie.</p>';

    } else if ( 'edit-famufest_movie' == $screen->id ) {

        $contextual_help = '<h2>Movies</h2>
		<p>Movies show the details of the movies selected for famufest. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p>
		<p>You can view/edit the details of each movie by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';

    }
    return $contextual_help;
}
add_action( 'contextual_help', 'famufest_movie_contextual_help', 10, 3 );

/**
 * @return array meta box information
 */
function famufest_movie_author_meta_box() {
    $meta_box = array();
    $meta_box['title'] = _x('Author', 'famufest movie boxes');
    $meta_box['pages'] = array( 'famufest_movie' );

    $meta_box['fields'] = array(
        array(
            'name'  => __("Author's Name", 'Famufest Movie'),
            'id'    => "famufest_movie_author_name",
            'desc'  => __('Name of the author of the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Author's email", 'Famufest Movie'),
            'id'    => "famufest_movie_author_email",
            'desc'  => __('Email of the author of the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name' => __("Author's photo", 'Famufest Movie'),
            'id'   => "famufest_movie_author_photo",
            'desc'  => __('Photo of the author of the movie. When you add the photo, select image size - thumbnail.', 'Famufest Movie'),
            'type' => 'thickbox_image',
            'clone' => false
        )
    );


    return $meta_box;
}

/**
 * @return array meta box information
 */
function famufest_movie_details_meta_box() {
    $meta_box = array();
    $meta_box['title'] = _x('Details', 'Famufest Movie');
    $meta_box['pages'] = array( 'famufest_movie' );

    $meta_box['fields'] = array(
        array(
            'name'  => __("Duration (in minutes)", 'Famufest Movie'),
            'id'    => "famufest_movie_duration",
            'desc'  => __('Duration of the movide in minutes.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Faculty", 'Famufest Movie'),
            'id'    => "famufest_movie_faculty",
            'desc'  => __('Faculty where the movie was made.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Made in year", 'Famufest Movie'),
            'id'    => "famufest_movie_year",
            'desc'  => __('Year when the movie was created (finished).', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Type of exercise", 'Famufest Movie'),
            'id'    => "famufest_movie_exercise",
            'desc'  => __('Type of exercise for which the movie was created.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Director", 'Famufest Movie'),
            'id'    => "famufest_movie_director",
            'desc'  => __('Name of the director of the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Screenwriter", 'Famufest Movie'),
            'id'    => "famufest_movie_screenplay",
            'desc'  => __('Name of the author of the screenplay for the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Camera", 'Famufest Movie'),
            'id'    => "famufest_movie_camera",
            'desc'  => __('Name of the cameraman who filmed the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Film Editor", 'Famufest Movie'),
            'id'    => "famufest_movie_editor",
            'desc'  => __('Name of the editor of the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Sound", 'Famufest Movie'),
            'id'    => "famufest_movie_sound",
            'desc'  => __('Name of the person responsible for sounds in the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Producer", 'Famufest Movie'),
            'id'    => "famufest_movie_producer",
            'desc'  => __('Name of the producer of the movie.', 'Famufest Movie'),
            'type'  => 'text'
        ),
        array(
            'name'  => __("Actors", 'Famufest Movie'),
            'id'    => "famufest_movie_actors",
            'desc'  => __('Actors appearing in the movie. Write each actor into separate field. You can add more fields using the plus button on the right side of this box.', 'Famufest Movie'),
            'type'  => 'text',
            'clone' => 'true'
        )
    );


    return $meta_box;
}

/**
 * Register meta boxes
 *
 * @return void
 */
function famufest_movie_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;

    $meta_boxes = array();

    $meta_boxes[] = famufest_movie_author_meta_box();
    $meta_boxes[] = famufest_movie_details_meta_box();


    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'famufest_movie_register_meta_boxes' );

function famufest_movie_register_events_connection(){
    p2p_register_connection_type( array(
        'name' => 'movies_to_events',
        'from' => 'famufest_movie',
        'to' => 'tribe_events'
    ) );
}
add_action( 'p2p_init', 'famufest_movie_register_events_connection' );


function transliterateString($txt) {
    $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE',
        'ḃ' => 'b', 'Ḃ' => 'B',
        'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C',
        'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e',
        'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E',
        'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F',
        'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G',
        'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H',
        'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I',
        'ĵ' => 'j', 'Ĵ' => 'J',
        'ķ' => 'k', 'Ķ' => 'K',
        'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L',
        'ṁ' => 'm', 'Ṁ' => 'M',
        'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N',
        'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE',
        'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r',
        'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R',
        'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS',
        'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T',
        'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE',
        'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W',
        'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z',
        'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th',
        'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd',
        'е' => 'e', 'Е' => 'e', 'ё' => 'e', 'Ё' => 'e', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o',
        'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c',
        'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
    $txt = str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
    return $txt;
}

function famufest_movie_save_action($post_id){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( 'famufest_movie' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
    }

    $post = get_post($post_id);
    $normalized_title = strtoupper(transliterateString($post->post_title));
    $normalized_author_name = strtoupper( transliterateString( rwmb_meta( 'famufest_movie_author_name', 'type=text', $post_id ) ) );
    $first_letter = (string) @$normalized_title[0];
    $first_author_letter = (string) @$normalized_author_name[0];

    $term = $first_letter;
    if (!preg_match("/^[A-Z]$/", $term)) {
        $term = is_numeric($first_letter) ? '#' : null;
    }

    if ($term != null){
        wp_set_post_terms( $post_id, $term, 'famufest_alphabet');
    }

    wp_set_post_terms( $post_id, $first_author_letter, 'famufest_authors_alphabet');
}
add_action('save_post', 'famufest_movie_save_action');

function famufest_movie_rewrites( $rules ) {
    $custom_rules = array();

    $custom_rules['movies/(.)/?$'] = 'index.php?post_type=famufest_movie&letter=$matches[1]';
    $custom_rules['movies/([^/]+)/?$'] = 'index.php?post_type=famufest_movie&category_name=$matches[1]';
    $custom_rules['movies/([^/]+)/(.)/?$'] = 'index.php?post_type=famufest_movie&category_name=$matches[1]&letter=$matches[2]';

    $custom_rules['authors/?$'] = 'index.php?post_type=famufest_movie';
    $custom_rules['authors/(.)/?$'] = 'index.php?post_type=famufest_movie&author_letter=$matches[1]';

    return $custom_rules + $rules;
}
add_filter( 'rewrite_rules_array', 'famufest_movie_rewrites' );

if ( ! is_admin() ) {
    function famufest_movie_authors_template_include($template) {
        if ( stripos($_SERVER['REQUEST_URI'], 'authors') !== false ) {
            return locate_template( array( 'archive-famufest_movie-authors.php' ) );
        }
        return $template;
    }
    add_action('template_include', 'famufest_movie_authors_template_include', 1);

    function famufest_movie_authors_title( $title, $sep = null ) {

        if ( stripos($_SERVER['REQUEST_URI'], 'authors') !== false ) {
            return str_replace(__('Movies'), __('Authors'), $title);
        }

        return $title;
    }
    add_filter( 'wp_title', 'famufest_movie_authors_title', 0);
}

