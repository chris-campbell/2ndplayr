<?php
$size = $args['size'];
$image_url = $args['url'];
$selected_size = '';

switch ($size) {
    case 'sm':
        $selected_size = 'w-8 h-8';
        break;
    case 'md':
        $selected_size = 'w-24 h-24';
        break;
    case 'lg':
        $selected_size = 'w-40 h-40';
        break;
    default:
        $selected_size = 'w-12 h-12';
        break;
}
?>

<img class='<?php echo $selected_size; ?> rounded-full' src='<?php echo $image_url; ?>' />
