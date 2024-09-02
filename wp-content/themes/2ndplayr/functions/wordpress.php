<?php
add_theme_support('menus');
add_theme_support('post-thumbnails');


function create_faq_topics_taxonomy() {
    register_taxonomy(
        'faq_topic',
        'post', // Adjust if you're using a custom post type
        array(
            'label' => __('FAQ Topics'),
            'rewrite' => array('slug' => 'faq-topic'),
            'hierarchical' => true, // Set to true if you want hierarchical terms like categories
        )
    );
}
add_action('init', 'create_faq_topics_taxonomy');

function sp_register_menu_nav() 
{
    register_nav_menu('header-menu', __('Header Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'sp_register_menu_nav');


add_theme_support('menus');
add_theme_support('post-thumbnails');



