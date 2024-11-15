<?php
$post_data = $args['post'];
$post_id = $post_data->ID;
$title = $post_data->post_title;
$excerpt = $post_data->post_excerpt;
$permalink = get_permalink($post_id);
$date = $post_data->post_date;
$formatted_date = date('M d, Y', strtotime($date));
$post_url = get_permalink($post_id);

$featured_image_id = get_post_thumbnail_id($post_id);

$featured_image_url = '';
if ($featured_image_id) {
    $image_attributes = wp_get_attachment_image_src($featured_image_id, 'full');
    if ($image_attributes) {
        $featured_image_url = $image_attributes[0];
    }
}

$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$author_name = get_the_author();
$author_avatar_url = get_avatar_url($author_id);
$post_content = get_the_content();
$read_time = calculate_read_time($post_content);
$categories = get_the_category();

$categories = wp_get_post_categories($post_id, array('fields' => 'all'));

$author_args = [
    'author_avatar_url' => $author_avatar_url, 
    'author_url' => $author_url, 
    'author_name' => $author_name, 
    'formatted_date' => $formatted_date
];
?>

<article class="bg-midnight mb-8 rounded-xl" id="post-<?php echo $post_data->ID; ?>" <?php post_class('', $post_data->ID); ?>>
    <div class='flex items-start px-8 py-12 gap-12 flex-col md:flex-row'>
        <?php
        get_template_part('partials/square-image', null, ['featured_image_url' => $featured_image_url]);
        ?>

        <div class="w-full">
            <?php
            get_template_part('partials/categories', null, ['categories' => $categories]);
            ?>

            <h2 class='text-2xl pb-4 font-serif font-semibold text-white capitalize'><?php echo $title; ?></h2>
            <p class='text-white pb-6 text-lg font-light max-w-101'>
                <?php 
                echo $excerpt; 
                ?>
            </p>

            <?php
            get_template_part('partials/byline', null, $author_args);
            ?>

            <div class="flex justify-between items-center">
                <a class="bg-ruby text-white text-base py-2 px-4 rounded-xl hover:bg-rubydark transition duration-200" href="<?php echo esc_url($post_url); ?>">
                    Read More
                </a>
                <div class='flex items-center gap-4 text-white'>
                    <span><?php sp_file_get_contents('book-open.svg'); ?></span>
                    <span><?php echo esc_html($read_time); ?> min read</span>
                </div>
            </div>
        </div>
    </div>
</article>