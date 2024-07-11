<?php
$counter_file = 'counter.txt';

if (!file_exists($counter_file)) {
    file_put_contents($counter_file, '0');
}

$current_count = file_get_contents($counter_file);

$new_count = $current_count + 1;

file_put_contents($counter_file, $new_count);

echo "This page has been refreshed " . $new_count . " times.";
