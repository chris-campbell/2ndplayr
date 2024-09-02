<?php

/**
 * Template Name: Home
 */

$args = array(
    'posts_per_page' => 5
);

$query = new WP_Query($args);

get_header();
?>

<main class="bg-night pb-16">
    <div class="max-w-284 mx-auto pt-16 px-6">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('partials/home/board-featured-image-article', null, array('post' => $post));
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
?>
