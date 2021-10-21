<?php
function create_taxonomy()
{
    // create a new taxonomy
    register_taxonomy(
        'team',
        ['employee'],
        array(
            "hierarchical" => true,
            "label" => "Team term",
            'labels' => array(
                'add_new_item' => 'add employee term'
            ),
            "singular_label" => "team",
            'show_in_rest' => true,
            'public' => true,
            "rewrite" => array('slug' => 'team')//, 'hierarchical' => true
        )
    );


}


function create_post_type()
{
    register_post_type('employee', array(
        'supports' => array('title', 'editor','excerpt','thumbnail'),
        'public' => true,
        'publicly_queryable' => true,
        'labels' => array(
            'name' => 'Employee',
            'add_new' => 'Add employee',
            'add_new_item' => 'Add employee',
            'edit_item' => 'Edit employee',
            'all_items' => 'All employee',
            'singular_name' => 'employee'
        ),
        'has_archive'         => true,
        'rewrite' => [
            'slug' => 'employee'],
        'taxonomies' => array('team'),
        'menu_icon' => 'dashicons-admin-comments'
    ));
}

add_action('init', 'create_taxonomy');

add_action('init', 'create_post_type');
