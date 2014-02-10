<?php
require_once('../php/classes/TitleDatabase.php');
include('../php/init.php');

# Get name from URI - should end in /redirect/NAME
$uri = $_SERVER['REQUEST_URI'];
$name = preg_replace('/.*\/redirect\//', '', $uri);
$name = preg_replace('/\?.*/', '', $name);
$name = urldecode($name);

if (!$name) {
    header ("Content-type: text/plain; charset=UTF-8");
    print "No name in /redirect/... link.";
    exit;
}

$entry = $data[$name];

if (!$entry) {
    header ("Content-type: text/plain; charset=UTF-8");
    print "No entry for name '$name'.";
    exit;
}

$domain = $entry['url'];
$filename = "$dataPath/$name";

$tdb = new TitleDatabase($filename);
$rawtitle = $tdb->randomTitle();
$title = str_replace('%3A', ':', urlencode(str_replace(' ', '_', $rawtitle)));

header("Location: //$domain/wiki/$title");
?>
