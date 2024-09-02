<?php

/**
 * sp_scripts_styles()
 */
function sp_scripts_styles()
{
    // Define script and style version based on the file modification time for cache busting
    $theme_directory = get_stylesheet_directory();
    $style_path = '/frontend/dist/main.css';
    $script_path = '/frontend/dist/main.js';

    $style_ver = file_exists($theme_directory . $style_path) ? filemtime($theme_directory . $style_path) : '1.0';
    $script_ver = file_exists($theme_directory . $script_path) ? filemtime($theme_directory . $script_path) : '1.0';

    // Use WP_DEBUG to handle script suffixes for development and production environments
    $suffix = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';

    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/frontend/dist/main' . $suffix . '.css', array(), $style_ver);
    wp_enqueue_script('main-script', get_stylesheet_directory_uri() . '/frontend/dist/main' . $suffix . '.js', array('jquery'), $script_ver, true);
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/zmx0dog.css', array(), null);

    wp_localize_script('main-script', 'spData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sp_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'sp_scripts_styles');

function add_id_to_headings($content) {
    // Define a regular expression pattern to match all heading tags (h1 to h6) with any attributes
    $pattern = '/<h([1-6])(.*?)>(.*?)<\/h\1>/i';
    
    // Callback function to add ID to headings
    $content = preg_replace_callback($pattern, function($matches) {
        // Create a slug from the heading text
        $slug = sanitize_title($matches[3]);
       

        // Return the heading with the ID attribute
        return '<h' . $matches[1] . $matches[2] . ' id="' . $slug . '">' . $matches[3] . '</h' . $matches[1] . '>';

    }, $content);
    
    return $content;
}
add_filter('the_content', 'add_id_to_headings');

function enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/frontend/ts/custom-script.ts', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function save_acf_faq_topics($post_id) {
    // Check if it's a valid save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check if it's not a revision
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // Clear existing terms
    wp_set_object_terms($post_id, array(), 'faq_topic');

    // Save the new terms from ACF
    if (isset($_POST['acf'])) {
        $faqs = $_POST['acf']['field_faq_repeater'];
        if ($faqs) {
            foreach ($faqs as $index => $faq) {
                if (isset($faq['field_faq_topics'])) {
                    $terms = $faq['field_faq_topics'];
                    // Save terms to the post
                    wp_set_object_terms($post_id, $terms, 'faq_topic', true);
                }
            }
        }
    }
}
add_action('save_post', 'save_acf_faq_topics');
