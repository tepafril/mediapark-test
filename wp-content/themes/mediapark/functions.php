<?php

// remove emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'menus' );



function mediapark_enqueue_scripts() {

    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');  

    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/vendors/jquery/jquery-3.1.1.min.js', array() );
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/vendors/swiperjs/js/swiper-bundle.min.js', array('jquery') );
    wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/9e842521c0.js', array('jquery') );
    wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array('jquery') );
    wp_localize_script( 'app', 'ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    
}
add_action( 'wp_enqueue_scripts', 'mediapark_enqueue_scripts' );





function mediapark_enqueue_styles() {

    wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&family=Quicksand:wght@700&display=swap', array(), null );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/vendors/swiperjs/css/swiper-bundle.min.css' );

	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'mediapark', get_stylesheet_uri(), array(), $theme_version );

}
add_action( 'wp_enqueue_scripts', 'mediapark_enqueue_styles' );






function register_my_menus() {
    register_nav_menus(
        array(
        'primary-menu' => __( 'Primary Menu' ),
        'footer-menu-1' => __( 'Footer Menu 1' ),
        'footer-menu-2' => __( 'Footer Menu 2' )
        )
    );
}
add_action( 'init', 'register_my_menus' );






function wpdocs_theme_setup() {
    add_image_size( 'thumb-400', 400 );
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );




if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
}


add_action( 'init', function (){
    
    register_post_type( 'callcenter',
        array(
            'labels' => array(
                'name' => __( 'Call Center' ),
                'singular_name' => __( 'Call Center' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'callcenter'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-phone',
            'supports'  => array('author')
        )
    );
    
    register_post_type( 'property',
        array(
            'labels' => array(
                'name' => __( 'Property' ),
                'singular_name' => __( 'Property' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'property'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-admin-home',
            'supports'  => array('author')
        )
    );

});




// define the actions for the two hooks created, first for logged in users and the next for logged out users
add_action("wp_ajax_nopriv_request_filter", "request_filter");

// define the function to be fired for logged in users
function request_filter() {
    
    global $wpdb;

    // nonce check for an extra layer of security, the function will exit if it fails
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "filter_nonce")) {
        exit("Unauthorized");
    }

    $filter = $_POST['filter'];
    $filter_value = $_POST['filter_value'];

    $table_row = '';


    $campaigns = new WP_Query(array(
        'post_type' =>  'property',
        'order'     => 'ASC',
        'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
            array(
                'key' => $filter,
                'value' => $filter_value,
                'compare' => '=',
                'type' => 'string'
            )
        )
    ));

    while ( $campaigns->have_posts() ) : $campaigns->the_post();
        $discount = ( (int) get_field('discount') > 0) ? get_field('discount') . '%' : '';
        $active_class = ( (int) get_field('discount') > 0) ? 'class="active"' . '' : '';

        $table_row .= '
        <tr '. $active_class .'>
            <td>-'. $discount .'</td>
            <td>'. get_field('house_no') .'</td>
            <td>'. get_field('area_m2') .'</td>
            <td>'. get_field('number_of_rooms') .'</td>
            <td>'. get_field('window_orientation') .'</td>
            <td>'. get_field('completion') .'</td>
        </tr>
        ';
    endwhile;

    $result = array(
        'status'        => '200',
        'data'          => $table_row
    );
    $result = json_encode($result);
    echo $result;
    die();

}


