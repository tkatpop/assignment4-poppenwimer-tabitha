<?php

function custom_theme_scripts(){
    //Bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');

    //Main CSS
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // wp_enqueue_script('jquery');

    //Javascript Files
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/scripts.js');
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');

//Display Feature Images
add_theme_support('post-thumbnails');

//Custom Image Header

$custom_image_header = array(
    'width'     => 520,
    'height'    => 150,
    'uploads'   => true
);

add_theme_support('custom-header', $custom_image_header);


//Remove Ob End Flush Error Message
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

//Featured Images
add_theme_support('post-thumbnails');

//Post Data Information
function post_data(){
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
?>
    <p>Written By: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a> | Published On: <a href="<?php echo get_day_link($archive_year,$archive_month,$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a></p>
<?php

}

//Add Menus to Theme

function register_my_menus(){
    register_nav_menus(array(
        'main-menu'     => __('Main Menu'),
        'footer-left'   => __('Left Footer Menu'),
        'footer-middle' => __('Middle Footer Menu'),
        'footer-right'  => __('Right Footer Menu')
    ));
}

add_action('init','register_my_menus');

?>