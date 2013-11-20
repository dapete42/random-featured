<?php

include('init.php');

require_once('classes/MediawikiQueryCategoryTitleDownloader.php');
require_once('classes/TitleDatabase.php');

foreach ($data as $name => $entry) {
	filltable ($dataPath, $name, $entry['url'], $entry['category'], $entry['ns'], $entry['cut']);
}

function filltable ($path, $filename, $domain, $category, $namespace, $cutoff) {
  global $userAgent;   

  $multi = new MediawikiQueryCategoryTitleDownloader($userAgent, $domain);
  $titles = $multi->download($category, $namespace);

  if ($cutoff) {
    $titlesOld = $titles;
    $titles = array();
    foreach ($titlesOld as $title) {
      $titles[] = mb_substr($title,$cutoff);
    }
  }

  $tdb = new TitleDatabase("$path/$filename");

  $tdb->deleteTitles();
  $tdb->saveTitles($titles);
}

?>
