<?php

include_once ('config.php');

function redirect ($filename, $domain) {
	$tdb = new TitleDatabase($filename);
	$title = $tdb->randomTitle();
	$rawtitle = $title;
	$title = str_replace('%3A', ':', urlencode(str_replace(' ', '_', $title)));
	redirect_location ("http://$domain/wiki/$title", $rawtitle);
}

function redirect_location ($location, $title) {
	if (@$_GET[redirect] == 'no' || @$_GET[redirect] == '0') {
		header ("Content-type: text/html; charset=UTF-8");
		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n<html><head><title>$category</title></head><body><a href=\"$location\">$title</a></body></html>\n";
	}
	else {
		header ("Location: $location");
	}
}

?>
