<?php
/**
 * @package Mediapark Unsplash Shortcode
 * @version 1.0.0
 */
/*
Plugin Name: Mediapark Unsplash Shortcode
Description: This is to create shortcode that fetch unsplash API.
Author: Afril Tep
Version: 1.0.0
*/


function call_unsplash_gallery( $atts ) {

    $attributes = shortcode_atts( array('slide_item' => "5", 'keyword' => "Cambodia"), $atts );
    $slide_item = $attributes['slide_item'];
    $keyword = $attributes['keyword'];

    $unsplah_contents = file_get_contents('https://api.unsplash.com/search/photos?client_id=XtHED4jES9u9jiosLmayr3aLlJ2yVcy6T66Y_yObg7A&page=1&per_page='. $slide_item .'&query=' . $keyword);
    $unsplah_array = json_decode($unsplah_contents,true);
    $unsplah_array = $unsplah_array['results'];

    $results = '';
    foreach( $unsplah_array as $unsplah_item )
    {
        $thumb = $unsplah_item['urls']['raw'] . '?q=70&fm=jpg&crop=faces&fit=crop&h=400&w=400';
        $title = (!is_null($unsplah_item['sponsorship']['tagline'])) ? $unsplah_item['sponsorship']['tagline'] : 'Lorem ipsum dolor sit amet';
        $description = (!is_null($unsplah_item['description'])) ? $unsplah_item['description'] : 'Amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut';

        $results .= '<div class="swiper-slide">
                        <div class="swiper-slide-thumbnail-container">
                            <img src="' . $thumb . '">
                        </div>
                        <div class="swiper-slide-text-container">
                        <h2 class="m-0 pt-8 pl-8 pr-8 pb-6 text-left">' . $title . '</h2>
                        <p class="m-0 pl-8 pr-2 text-left">
                            ' . $description . '
                        </p>
                        <div class="text-right mr-10"><a class=""><i class="fa-solid fa-arrow-right-long fa-2x"></i></a></div>
                        </div>
                    </div>';
    }

    return $results;
}
add_shortcode('call_unsplash_gallery', 'call_unsplash_gallery');




function call_unsplash_blog( $atts ) {

    $attributes = shortcode_atts( array('slide_item' => "5", 'keyword' => "Cambodia"), $atts );
    $slide_item = $attributes['slide_item'];
    $keyword = $attributes['keyword'];

    $unsplah_contents = file_get_contents('https://api.unsplash.com/search/photos?client_id=XtHED4jES9u9jiosLmayr3aLlJ2yVcy6T66Y_yObg7A&page=1&per_page='. $slide_item .'&query=' . $keyword);
    $unsplah_array = json_decode($unsplah_contents,true);
    $unsplah_array = $unsplah_array['results'];

    $results = '';
    foreach( $unsplah_array as $unsplah_item )
    {
        $thumb = $unsplah_item['urls']['raw'] . '?q=70&fm=jpg&crop=faces&fit=crop&h=800&w=800';
        $title = (!is_null($unsplah_item['sponsorship']['tagline'])) ? $unsplah_item['sponsorship']['tagline'] : 'Lorem ipsum dolor sit amet';
        $description = (!is_null($unsplah_item['description'])) ? $unsplah_item['description'] : 'Amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut';

        $results .= '
                    <div class="col-sm-6 col-md-4">
                    <div class="p-4">
                        <div class="thumbnail-container">
                        <img src="'.$thumb.'" alt="Avatar" class="image">
                        <div class="overlay">'.$title.'</div>
                        </div>
                    </div>
                    </div>
                ';
    }

    return $results;
}
add_shortcode('call_unsplash_blog', 'call_unsplash_blog');
