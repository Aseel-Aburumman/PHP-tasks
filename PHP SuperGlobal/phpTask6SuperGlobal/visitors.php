<?php
$visitorsFile = 'visitors.txt';

if (!file_exists($visitorsFile)) {
    file_put_contents($visitorsFile, '0');
}

$visitor = file_get_contents($visitorsFile);

$visitor++;

file_put_contents($visitorsFile, $visitor);
echo "Page visitors: " . $visitor;
