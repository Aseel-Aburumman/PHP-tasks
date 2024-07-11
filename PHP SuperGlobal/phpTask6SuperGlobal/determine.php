<?php
session_start();

$project_name = basename(dirname(__FILE__));

$script_name = basename(__FILE__);

echo "Project Name: " . $project_name . "<br>";
echo "Script Name: " . $script_name . "<br>";
