<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        $post_author = get_the_author();
        $post_title = get_the_title();
        $post_date = get_the_date();
        $post_excerpt = get_the_excerpt();
        $post_featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $post_url = get_permalink(get_the_ID());
        $post_content = get_the_content();
    }
}

$author_id = get_the_author_meta('ID');
$author_twitter = 'https://x.com/2ndPlayr';
$author_youtube = 'https://www.youtube.com/@2ndplayer';
$author_linkedin = get_field('linkedin', 'user_' . $author_id);
$author_facebook = get_field('facebook', 'user_' . $author_id);
$author_tiktok = 'https://www.tiktok.com/@2ndplayerco';

$read_time = calculate_read_time($post_content);
$args = array(
    'feature_image' => $post_featured_image,
    'read_time' => $read_time
);
?>

<main id='main-content' class='site-main'>
    <?php
    get_template_part('partials/blog-single/hero', null, $args);
    ?>
    
    <section class='content bg-night'>
        <div class='max-w-212 mx-auto px-8'>
            <?php
            the_content();
            ?>
        </div>

        <div id='notification' class='notification'>Link copied to clipboard!</div>
    </section>

    <section class='bg-night pb-8'>
        <div class='max-w-212 mx-auto p-8'>
            <div class='flex items-center w-full mb-12'>
                <h2 class='text-2xl font-semibold text-white'>About the Author</h2>
                <div class='flex-grow border-t-2 border-red-500 ml-4'></div>
            </div>
            <div class='flex gap-10 items-start flex-col md:flex-row md:gap-24'>
                <?php
                get_template_part('partials/avatar', null, ['size' => 'lg', 'url' => get_avatar_url($author_id)]);
                ?>

                <div>
                    <h3 class='font-serif font-semibold text-white text-lg mb-3'>Chris Campbell</h3>
                    <p class='font-sans font-light text-white text-lg mb-6'>
                        <?php
                        echo get_the_author_meta('description');
                        ?>
                    </p>

                    <div class='flex mb-8'>
                        <?php
                        if ($author_twitter) :
                        ?>
                            <div class='flex gap-2 pr-4 text-white'>
                                <a class='flex gap-2' href='<?php echo esc_url($author_twitter); ?>' target='_blank'>
                                    <?php sp_file_get_contents('twitter.svg'); ?>
                                    Twitter
                                </a>
                            </div>
                        <?php
                        endif;
                        if ($author_facebook) :
                        ?>
                            <div class='flex gap-2 pr-4 text-white'>
                                <a class='flex gap-2' href='<?php echo esc_url($author_facebook); ?>' target='_blank'>
                                    <?php sp_file_get_contents('facebook.svg'); ?>
                                    Facebook
                                </a>
                            </div>
                        <?php
                        endif;
                        if ($author_linkedin) :
                        ?>
                            <div class='flex gap-2 pr-4 text-white'>
                                <a class='flex gap-3' href='<?php echo esc_url($author_linkedin); ?>' target='_blank'>
                                    <?php sp_file_get_contents('linkedin.svg'); ?>
                                    LinkedIn
                                </a>
                            </div>
                        <?php
                        endif;
                        ?>
                        <div class='flex gap-2 pr-4 text-white'>
                            <a class='flex gap-3' href='<?php echo esc_url($author_youtube); ?>' target='_blank'>
                                <?php sp_file_get_contents('youtube.svg'); ?>
                                YouTube
                            </a>
                        </div>

                        <div class='flex gap-2 text-white'>
                            <a class='flex gap-3' href='<?php echo esc_url($author_tiktok); ?>' target='_blank'>
                                <?php sp_file_get_contents('tiktok.svg'); ?>
                                TikTok
                            </a>
                        </div>
                    </div>

                    <a href='/author/ccampbell/'>
                        <button class='bg-ruby text-white text-sm py-2 px-6 rounded-xl hover:bg-rubydark transition duration-200'>View all articles</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<div id='notification' class='notification'>Link copied to clipboard!</div>

<?php
get_footer();
?>