<?php
session_start();

$visitors_file = 'visitors.txt';

if (!file_exists($visitors_file)) {
    file_put_contents($visitors_file, '0');
}

if (!isset($_SESSION['is_new_visitor'])) {
    $visitor_count = file_get_contents($visitors_file);

    $visitor_count++;

    file_put_contents($visitors_file, $visitor_count);

    $_SESSION['is_new_visitor'] = true;
}

echo "Number of unique visitors: " . file_get_contents($visitors_file);
