<?php
//Geeky Business

function geeky_business_custom_init() {
  $labels = array(
    'name' => 'Geeky',
    'singular_name' => 'Geeky',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Geeky',
    'edit_item' => 'Edit Geeky',
    'new_item' => 'New Geeky',
    'all_items' => 'All Geekys',
    'view_item' => 'View Geeky',
    'search_items' => 'Search Geekys',
    'not_found' =>  'No Geekys found',
    'not_found_in_trash' => 'No Geekys found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Geeky Business'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'geeky_business' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'geeky_business', $args );
}
add_action( 'init', 'geeky_business_custom_init' );


