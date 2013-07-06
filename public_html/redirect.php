<?php
require_once('../php/classes/TitleDatabase.php');
include('../php/init.php');

# Get name from URI - should end in /redirect/NAME
$uri = $_SERVER['REQUEST_URI'];
$name = preg_replace('/.*\/redirect\//', '', $uri);
$name = preg_replace('/\?.*/', '', $name);

if (!$name) {
    header ("Content-type: text/plain");
    print "No name in /redirect/... link.";
    exit;
}

$entry = $data[$name];

if (!$entry) {
    header ("Content-type: text/plain");
    print "No entry for name $name.";
    exit;
}

redirect("$dataPath/$name", $entry['url']);
