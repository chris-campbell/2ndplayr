<?php
$recent_posts = new WP_Query(array(
    'posts_per_page' => 2,
    'post_status' => 'publish'
));

if ($recent_posts->have_posts()) :
    while ($recent_posts->have_posts()) : $recent_posts->the_post();
        $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
?>
        <div class="mb-8 md-2:mb-4 flex">
            <img src="<?php echo esc_url($post_thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-32 h-32 object-cover rounded mr-4">
            <div class="flex flex-col">
                <p class="text-white text-xl leading-6 mb-2"><?php the_title(); ?></p>
                <span class="text-white text-sm"><?php echo get_the_date(); ?></span>
            </div>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
else :
    ?>
    <p class="text-gray-400">No recent posts available.</p>
<?php
endif;
?>
