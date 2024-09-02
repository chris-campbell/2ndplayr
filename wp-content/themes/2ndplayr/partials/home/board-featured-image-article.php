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
$post_content = get_the_content();
$read_time = calculate_read_time($post_content);
$categories = get_the_category();
?>

<article class="bg-midnight mb-8 rounded-xl" id="post-<?php echo $post_data->ID; ?>" <?php post_class('', $post_data->ID); ?>>
    <div class='flex items-center px-8 py-12 gap-12 flex-col md:flex-row'>

        <img class="w-full md:w-1/2 aspect-square rounded-xl" src='<?php echo $featured_image_url; ?>' />
        <div class="w-full">
            <?php 
            if ( ! empty( $categories ) ) : 
            ?>
                <span class="text-sky font-semibold capitalize mb-4 block">
                    <?php 
                    $category_links = array();
                    foreach ( $categories as $category ) {
                        $category_links[] = esc_html( $category->name );
                    }
                    echo implode( ' • ', $category_links );
                    ?>
                </span>
            <?php 
            endif; 
            ?>
            
            <h2 class='text-2xl pb-4 font-serif font-semibold text-white uppercase md-2:text-3xl'><?php echo $title; ?></h2>
            <p class='text-white pb-6 text-lg font-light max-w-101'>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>

            <div class='flex items-center mb-8'>
                <img class="w-12 h-12 rounded-full" src='http://localhost:10034/wp-content/uploads/2024/04/Friendly-typo-inspo.png' />
                <div>
                    <span class="font-medium text-white pl-4 pr-1">By</span>
                    <span class="text-sky font-bold">
                        <a href="<?php echo esc_url($author_url); ?>">
                            <?php 
                            echo $author_name; 
                            ?>
                        </a>
                    </span>
                    <span class="text-white"> • </span>
                    <span class="text-white">
                        <?php 
                        echo $formatted_date; 
                        ?>
                    </span>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <a href="<?php echo esc_url($post_url); ?>">
                    <button class="bg-ruby text-white text-base py-2 px-4 rounded-xl hover:bg-rubydark transition duration-200">Read More</button>
                </a>
                <div class='flex items-center gap-4 text-white'>
                    <span><?php sp_file_get_contents('book-open.svg'); ?></span>
                    <span><?php echo esc_html($read_time); ?> min read</span>
                </div>
            </div>
        </div>
    </div>
</article>
