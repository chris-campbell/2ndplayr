<?php
if (isset($args)) {
    $hero_image = isset($args['feature_image']) ? $args['feature_image'] : '';
    $read_time = isset($args['read_time']) ? $args['read_time'] : '';
} else {
    $hero_image = '';
    $read_time = '';
}

$post_title = get_the_title();
$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$author_name = get_the_author();
?>

<section class="bg-night py-8">
    <div class="max-w-212 mx-auto px-8">
        <div>
            <div class="relative w-full pb-[56.25%] shadow-img mb-10 mt-6">
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Image" class="absolute inset-0 w-full h-full object-cover rounded-2xl">
            </div>

            <div class="mt-4">
                <h1 class="text-white text-4xl font-bold font-serif text-center uppercase">What's so Funny?</h1>

                <div class="text-white flex justify-between items-center mt-4 mb-12 max-w-176 mx-auto flex-col">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="<?php echo esc_url($hero_image); ?>" alt="Author Image">
                        <p class='font-sans font-light'><span class='font-semibold'>By</span> <span class='text-sky font-bold'><a href="<?php echo esc_url($author_url); ?>">
                                    <?php echo esc_html($author_name); ?>
                                </a></span> • October 21, 2024</p>
                    </div>
                    <div class='flex items-center gap-4'>
                        <span><?php sp_file_get_contents('book-open.svg'); ?></span>
                        <span><?php echo esc_html($read_time); ?> min read</span>
                    </div>
                </div>

                <p class="text-lg text-white font-sans font-light italic">
                    The best Lorem Ipsum Generator in all the sea! Heave this scurvy copyfiller fer yar next adventure and cajol yar clients into walking the plank with ev'ry layout! Configure above, then get yer pirate ipsum...own the high seas, arg!
                </p>
            </div>
        </div>
    </div>
</section>
