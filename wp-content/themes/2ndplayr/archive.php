<?php get_header(); ?>

<main class="bg-night p-8">
    <section class="category-header max-w-212 mx-auto mb-12">
        <h1 class="text-xl text-white font-serif font-semibold mb-4"><?php single_cat_title(); ?></h1>
        <p class="text-lg text-white font-sans font-light mb-8"><?php echo category_description(); ?></p>
    </section>

    <section class="max-w-212 mx-auto">
        <div class="flex items-center w-full mb-12">
            <h2 class="text-2xl font-semibold text-white">Category Posts</h2>
            <div class="flex-grow border-t-2 border-red-500 ml-4"></div>
        </div>

        <?php
        // Custom query to set posts per page for this category
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $custom_query = new WP_Query([
            'cat' => get_queried_object_id(),
            'posts_per_page' => 5, // Set your desired number of posts per page
            'paged' => $paged
        ]);

        if ($custom_query->have_posts()) :
        ?>
            <div class="category-posts">
                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <article class="text-lg text-white font-light mb-8">
                        <div class="flex flex-col gap-6 sm-2:flex-row">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="mb-4 w-full h-full rounded-lg sm-2:w-24 sm:-2:h-24" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title_attribute(); ?>" />
                            <?php endif; ?>
                            <div>
                                <h2 class="text-xl text-white font-serif font-bold mb-2">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            $pagination_args = [
                'total'     => $custom_query->max_num_pages,
                'current'   => $paged,
                'prev_text' => __('<'),
                'next_text' => __('>'),
                'type'      => 'list',
                'end_size'  => 1,
                'mid_size'  => 2,
            ];
            ?>
            <div class="pagination-container mb-8 pt-12">
                <?php echo paginate_links($pagination_args); ?>
            </div>

        <?php else : ?>
            <p class="text-white">No posts found in this category.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>
