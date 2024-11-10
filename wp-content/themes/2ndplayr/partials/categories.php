<?php
$categories = $args['categories']; // Or replace with get_the_category() as needed

if (!empty($categories)) :
?>
    <span class="text-sky font-semibold mb-4 block text-xs capitalize">
        <?php
        $category_links = [];
        foreach ($categories as $category) {
            // Ensure term_id and name are accessible
            $category_url = get_category_link($category->term_id); // Get the category URL
            $category_name = esc_html($category->name); // Sanitize the category name

            // Wrap each category name in a clickable link
            $category_links[] = '<a href="' . esc_url($category_url) . '">' . $category_name . '</a>';
        }
        
        // Output the category links, separated by ' • '
        echo implode(' • ', $category_links);
        ?>
    </span>
<?php
endif;
