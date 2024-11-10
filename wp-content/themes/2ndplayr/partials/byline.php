<?php
$author_avatar_url = $args['author_avatar_url'] ?? '';
$author_url = $args['author_url'] ?? '';
$author_name = $args['author_name'] ?? 'Unknown Author';
$formatted_date = $args['formatted_date'] ?? '';
?>

<div class='flex items-center mb-8 gap-2'>
    <?php 
    get_template_part('partials/avatar', null, ['size' => 'sm', 'url' => $author_avatar_url]); 
    ?>

    <div>
        <span class='font-medium text-white mr-1'>By </span>
        <span class='text-sky font-bold'>
            <a href='<?php echo $author_url; ?>'>
                <?php 
                echo esc_html($author_name);
                ?>
            </a>
        </span>
        <span class='text-white'> • </span>
        <span class='text-white'>
            <?php 
            echo esc_html($formatted_date); 
            ?>
        </span>
    </div>
</div>
