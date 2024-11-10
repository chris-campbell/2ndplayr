<?php
/**
 * Template Name: Home
 */

if (is_home() || is_front_page()) {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

$args = [
    'posts_per_page' => 2,
    'paged'          => $paged,
    'post_status'    => 'publish'
];

$query = new WP_Query($args);

get_header();
?>

<main class="bg-night pb-16">
    <div class="max-w-284 mx-auto pt-16 px-6">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('partials/home/board-featured-image-article', null, ['post' => $post]);
            endwhile;
        endif;

        get_template_part('partials/pagination', null, ['query' => $query, 'paged' => $paged]);
        ?>
    </div>
</main>

<?php
get_footer();
wp_reset_postdata();
