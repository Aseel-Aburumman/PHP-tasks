<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    // If the URL doesn't start with http:// or https://, add http:// by default
    if (!preg_match('/^http(s)?:\/\//', $url)) {
        $url = 'http://' . $url;
    }
    header('Location: ' . $url);
    exit();
} else {
    echo 'URL parameter is missing.';
}
