<?php
$query = $args['query'];
$paged = $args['paged'];

$args = array(
    'base'         => home_url('/') . 'page/%#%/',
    'format'       => '',
    'total'        => $query->max_num_pages,
    'current'      => $paged,
    'prev_text'    => __('Prev'),
    'next_text'    => __('Next'),
    'type'         => 'list',
    'end_size'     => 1,
    'mid_size'     => 2,
);
?>
<div class="pagination-container mb-8 pt-12">
    <?php
    echo paginate_links($args);
    ?>
</div>
