<?php

// Data path
$dataPath = '/data/project/random-featured/data/';

// User-Agent string to use for HTTP access to Wikipedia
$userAgent = 'random-featured (Tool Labs; http://tools.wmflabs.org/random-featured/)';

// de-WP has the category on the article
$data['dewiki'] 		= array('url' => 'de.wikipedia.org', 'category' => 'Wikipedia:Exzellent', 	'ns' => 0, 'cut' => 0);
$data['dewiki-lesenswert'] 	= array('url' => 'de.wikipedia.org', 'category' => 'Wikipedia:Lesenswert', 	'ns' => 0, 'cut' => 0);
$data['dewiki-datei'] 		= array('url' => 'de.wikipedia.org', 'category' => 'Datei:Exzellent', 		'ns' => 6, 'cut' => 0);

// no.WP has the category on the article (used to have it on the talk page)
$data['nowiki'] 		= array('url' => 'no.wikipedia.org', 'category' => 'Utmerkede_artikler', 	'ns' => 0, 'cut' => 0);
$data['nowiki-anbefalte'] 	= array('url' => 'no.wikipedia.org', 'category' => 'Anbefalte_artikler', 	'ns' => 0, 'cut' => 0);

// en.WP has the category on the talk page, "Talk:" has to be cut off
$data['enwiki'] 		= array('url' => 'en.wikipedia.org', 'category' => 'Wikipedia_featured_articles', 'ns' => 1, 'cut' => 5);
$data['enwiki-good'] 		= array('url' => 'en.wikipedia.org', 'category' => 'Wikipedia_good_articles', 	'ns' => 1, 'cut' => 5);

// ta.WP has the category on the talk page, "Talk:" has to be cut off
$data['tawiki'] 		= array('url' => 'ta.wikipedia.org', 'category' => 'முதற்பக்கக் கட்டுரைகள்', 'ns' => 1, 'cut' => 5);
$data['tawiki-good'] 		= array('url' => 'ta.wikipedia.org', 'category' => 'உங்களுக்குத் தெரியுமா கட்டுரைகள்', 	'ns' => 1, 'cut' => 5);

?>
