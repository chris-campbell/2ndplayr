<?php
if (isset($args)) {
    $hero_image = $args['feature_image'] ?? '';
    $read_time = $args['read_time'] ?? '';
} else {
    $hero_image = '';
    $read_time = '';
}

$post_title = get_the_title();
$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url(author_id: $author_id);
$author_name = get_the_author();
$post_excerpt = get_the_excerpt();
?>

<section class="bg-night py-8">
    <div class="max-w-212 mx-auto px-8">
        <div>
            <div class="relative w-full pb-[56.25%] shadow-img mb-10 mt-6">
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Image" class="absolute inset-0 w-full h-full object-cover rounded-2xl">
            </div>

            <div class="mt-4">
                <h1 class="text-white text-3xl font-bold font-serif text-center capitalize">
                    <?php
                    echo esc_html($post_title);
                    ?>
                </h1>
                <div class="text-white flex justify-between items-center mt-4 mb-12 max-w-176 mx-auto flex-col">
                    <?php
                    get_template_part('partials/byline', null, ['author_avatar_url' => get_avatar_url($author_id), 'author_url' => $author_url, 'author_name' => $author_name, 'formatted_date' => get_the_date('F j, Y')]);
                    ?>

                    <div class='flex items-center gap-4'>
                        <span><?php sp_file_get_contents('book-open.svg'); ?></span>
                        <span><?php echo esc_html($read_time); ?> min read</span>
                    </div>
                </div>

                <p class="text-lg text-white font-sans font-light italic">
                    <?php
                    echo $post_excerpt;
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>
