<?php

// Data path
$dataPath = '/data/project/random-featured/data/';

// User-Agent string to use for HTTP access to Wikipedia
$userAgent = 'random-featured (Tool Labs; http://tools.wmflabs.org/random-featured/)';

// de-WP has the category on the article
$data['dewiki'] 		= array('url' => 'de.wikipedia.org', 'category' => 'Wikipedia:Exzellent', 	'ns' => 0, 'cut' => 0, 'displayname' => 'Exzellente Artikel (Featured articles, German Wikipedia)');
$data['dewiki-lesenswert'] 	= array('url' => 'de.wikipedia.org', 'category' => 'Wikipedia:Lesenswert', 	'ns' => 0, 'cut' => 0, 'displayname' => 'Lesenswerte Artikel (Good articles, German Wikipedia)');
$data['dewiki-datei'] 		= array('url' => 'de.wikipedia.org', 'category' => 'Datei:Exzellent', 		'ns' => 6, 'cut' => 0, 'displayname' => 'Exzellente Bilder (Features images, German Wikipedia)');

// no.WP has the category on the article (used to have it on the talk page)
$data['nowiki'] 		= array('url' => 'no.wikipedia.org', 'category' => 'Utmerkede_artikler', 	'ns' => 0, 'cut' => 0, 'displayname' => 'Utmerkede artikler (Featured articles, Norwegian Wikipedia)');
$data['nowiki-anbefalte'] 	= array('url' => 'no.wikipedia.org', 'category' => 'Anbefalte_artikler', 	'ns' => 0, 'cut' => 0, 'displayname' => 'Anbefalte artikler (Good articles, Norwegian Wikipedia)');

// en.WP has the category on the talk page, "Talk:" has to be cut off
$data['enwiki'] 		= array('url' => 'en.wikipedia.org', 'category' => 'Wikipedia_featured_articles', 'ns' => 1, 'cut' => 5, 'displayname' => 'Featured articles (English Wikipedia)');
$data['enwiki-good'] 		= array('url' => 'en.wikipedia.org', 'category' => 'Wikipedia_good_articles', 	'ns' => 1, 'cut' => 5, 'displayname' => 'Good articles (English Wikipedia)');

// ta.WP has the category on the talk page, the Tamil equivalent of the "Talk:"
// prefix has to be cut off. It looks like 4 characters plus the ':', but it is
// 7 in total due to the way Tamil is encoded in Unicode.
$data['tawiki'] 		= array('url' => 'ta.wikipedia.org', 'category' => 'முதற்பக்கக்_கட்டுரைகள்', 'ns' => 1, 'cut' => 7, 'displayname' => 'Featured articles (Tamil Wikipedia)');
$data['tawiki-good'] 		= array('url' => 'ta.wikipedia.org', 'category' => 'உங்களுக்குத்_தெரியுமா_கட்டுரைகள்', 	'ns' => 1, 'cut' => 7, 'displayname' => 'Good articles (Tamil Wikipedia)');


?>
