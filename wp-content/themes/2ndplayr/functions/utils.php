<?php

function sp_file_get_contents($file_path)
{
    $file = file_get_contents(get_stylesheet_directory() . '/frontend/images/' . $file_path);
    echo $file;
}
