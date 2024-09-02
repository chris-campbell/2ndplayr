<?php

function calculate_read_time($content) {
    // Average reading speed (words per minute)
    $reading_speed = 200;

    // Count the number of words in the content
    $word_count = str_word_count(strip_tags($content));

    // Calculate the reading time in minutes
    $read_time = ceil($word_count / $reading_speed);

    return $read_time;
}
