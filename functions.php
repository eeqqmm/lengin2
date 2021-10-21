<?php
require_once get_theme_file_path('terms/terms.php');
require_once get_theme_file_path('transient/transient.php');
function scripts(){
    wp_enqueue_script('jq', 'https://code.jquery.com/jquery-3.6.0.min.js', '', '333', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/bundle.js', '', '333', true);
    wp_enqueue_style( 'dist-style', get_template_directory_uri() . '/dist/main.css');

    wp_localize_script('main-js', 'mainData', array(
            'ajaxUrl' => admin_url('admin-ajax.php')
        )
    );
}

add_action('wp_enqueue_scripts', 'scripts', 10);
function setup_thumb(){
    add_theme_support( 'post-thumbnails', array( 'employee') );
}

add_action('after_setup_theme','setup_thumb',10);

function employee (){
    $id = $_POST['data']['id'];
    $post = get_post($id);
    $meta = get_fields($id);
    $response_data = array();
    array_push($response_data,
        array(
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'content' =>$post->post_content,
            'phone' => $meta['phone'],
            'linkedin' => $meta['linkedin'],
            'main' => $meta['main_content'],
            'email'=>$meta['email'],
            'image_url'=>get_the_post_thumbnail_url($id)
        )
    );
    if (!empty($response_data)){
        wp_send_json_success($response_data);
    } else {
        wp_send_json_error($response_data);
    }
}
add_action('wp_ajax_nopriv_employee', 'employee');
add_action('wp_ajax_employee', 'employee');

