<?php
get_header();

$author_id = get_the_author_meta('ID');
$author_twitter = get_field('twitter', 'user_' . $author_id);
$author_facebook = get_field('facebook', 'user_' . $author_id);
$author_linkedin = get_field('linkedin', 'user_' . $author_id);

// Get the actual post count for the current author
$author_post_count = count_user_posts($author_id);
?>

<main class="bg-night p-8">
    <section class="flex flex-col gap-16 max-w-212 mx-auto mb-12 sm-2:flex-row">
        <img class="w-full h-full rounded-lg sm-2:w-40 sm:-2:h-40" src="http://localhost:10034/wp-content/uploads/2024/05/Simple-typography-inspo-2-Simple-typography-inspo1.png" />

        <div>
            <div>
                <h1 class='text-xl text-white font-serif font-semibold mb-2'><?php echo get_the_author(); ?></h1>
                <p class='text-lg text-white font-sans font-light mb-4'><?php echo get_the_author_meta('description'); ?></p>
            </div>

            <div class="flex mb-8">
                <?php if ($author_twitter) : ?>
                    <div class="flex gap-2 pr-4 text-white">
                        <a class="flex gap-2" href="<?php echo esc_url($author_twitter); ?>">
                            <?php sp_file_get_contents('twitter.svg'); ?>
                            Twitter
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($author_facebook) : ?>
                    <div class="flex gap-2 pr-4 text-white">
                        <a class="flex gap-2" href="<?php echo esc_url($author_facebook); ?>">
                            <?php sp_file_get_contents('facebook.svg'); ?>
                            Facebook
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($author_linkedin) : ?>
                    <div class="flex gap-2 pr-4 text-white">
                        <a class="flex gap-3" href="<?php echo esc_url($author_linkedin); ?>">
                            <?php sp_file_get_contents('linkedin.svg'); ?>
                            LinkedIn
                        </a>
                    </div>
                <?php endif; ?>

                <div class="flex gap-2 pr-4 text-white">
                    <a class="flex gap-3" href="<?php echo esc_url($author_youtube); ?>">
                        <?php sp_file_get_contents('youtube.svg'); ?>
                        YouTube
                    </a>
                </div>

                <div class="flex gap-2 text-white">
                    <a class="flex gap-3" href="<?php echo esc_url($author_tiktok); ?>">
                        <?php sp_file_get_contents('tiktok.svg'); ?>
                        TikTok
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-212 mx-auto">
        <div class="flex items-center w-full mb-12">
            <h2 class="text-2xl font-semibold text-white">Posts (<?php echo $author_post_count; ?>)</h2>
            <div class="flex-grow border-t-2 border-red-500 ml-4"></div>
        </div>
        <?php
        // Set up the query to get posts by the current author
        $args = array(
            'author' => $author_id,
            'post_type' => 'post',
            'posts_per_page' => 10, // Adjust the number of posts per page as needed
        );
        $author_posts = new WP_Query($args);

        if ($author_posts->have_posts()) :
        ?>
            <div class="author-posts">
                <?php
                while ($author_posts->have_posts()) : $author_posts->the_post();
                    $featured_image_url = '';
                    if (has_post_thumbnail()) {
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    }
                ?>
                    <article class="text-lg text-white font-light mb-8">
                        <div class="flex flex-col gap-6 sm-2:flex-row">
                            <?php if ($featured_image_url) : ?>
                                <img class="mb-4 w-full h-full rounded-lg sm-2:w-24 sm:-2:h-24" src="<?php echo esc_url($featured_image_url); ?>" alt="<?php the_title_attribute(); ?>" />
                            <?php endif; ?>
                            <div>
                                <h2 class="text-xl text-white font-serif font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php
                endwhile;
                ?>
            </div>
        <?php
        else :
        ?>
            <p>No posts by this author.</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </section>
</main>

<?php
get_footer();
?>
