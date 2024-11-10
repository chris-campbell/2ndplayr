<?php
/* Template Name: topics Page */
get_header();

$page_title = get_the_title();
$page_excerpt = get_the_excerpt();
?>
<section class="topics bg-night py-8">
    <div class="max-w-212 mx-auto px-8">
        <div>
            <div class="mt-4">
                <h1 class="text-white text-3xl font-bold font-serif text-center mb-8">
                    <?php
                    echo esc_html($page_title);
                    ?>
                </h1>
            </div>

            <div class="alphabet-links text-white text-center mb-24">
                <?php
                $topics = get_categories(array('hide_empty' => true));
                $letters_with_topics = array();

                $sorted_topics = array();
                foreach ($topics as $category) {
                    $first_letter = strtoupper(mb_substr($category->name, 0, 1));
                    if (!isset($sorted_topics[$first_letter])) {
                        $sorted_topics[$first_letter] = array();
                        $letters_with_topics[] = $first_letter;
                    }
                    $sorted_topics[$first_letter][] = $category;
                }

                $letters_with_topics = array_unique($letters_with_topics);
                sort($letters_with_topics);

                foreach ($letters_with_topics as $letter) {
                    echo '<a href="#' . $letter . '" class="inline-block px-4 py-2 text-sky hover:underline">' . $letter . '</a>';
                }
                ?>
            </div>

            <div class="topics-list text-white mt-8">
                <?php
                foreach ($sorted_topics as $letter => $cats):
                ?>
                    <div class="letter-group mb-4">
                        <h2 id="<?= $letter ?>" class="text-2xl font-bold"><?= $letter ?></h2>
                        <?php
                        if (!empty($cats)):
                        ?>
                            <ul>
                                <?php
                                foreach ($cats as $category):
                                ?>
                                    <li class="mt-2">
                                        <a href="<?= esc_url(get_category_link($category->term_id)) ?>" class="hover:underline text-sky">
                                            <?= esc_html($category->name) ?> (<?= $category->count ?>)
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        <?php
                        endif;
                        ?>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
