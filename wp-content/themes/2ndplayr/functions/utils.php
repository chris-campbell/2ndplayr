<?php

function sp_file_get_contents($file_path, $class = '') {
    $file = file_get_contents(get_stylesheet_directory() . '/frontend/images/' . $file_path);

    if ($class) {
        $file = preg_replace('/<svg([^>]*)>/', '<svg$1 class="' . $class . '">', $file, 1);
    }
    echo $file;
}

add_theme_support('post-thumbnails');