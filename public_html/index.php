<?php
require_once('../php/classes/TitleDatabase.php');
include_once('../php/init.php');
?><!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="//tools.wmflabs.org/style.css" type="text/css" media="screen" />
  <title>random-featured</title>
</head>

<body>

<div class="colmask leftmenu">
  <div class="colright">
    <div class="col1wrap">
      <div class="col1">
        <h1>random-featured</h1>
	<p>This is a list of all available random article lists available for this tool.</p>
        <p lang="de">Dies ist eine Liste aller mit diesem Tool verf&uuml;gbaren zuf&auml;lligen Artikellisten.</p>
	<table>
          <thead>
            <tr>
              <th>Name/Link</th>
	      <th>Description</th>
              <th>Domain</th>
              <th>Category</th>
              <th>No. of pages</th>
            </tr>
          </thead>
          <tbody>
<?php
foreach ($data as $name => $entry) {
	$filename = "$dataPath/$name";
	$tdb = new TitleDatabase($filename);
	$numberOfTitles = $tdb->numberOfTitles();
?>
            <tr>
              <td><a href="redirect/<?php print urlencode($name); ?>"><?php print htmlspecialchars($name); ?></a></td>
	      <td><?php print htmlspecialchars($entry['displayname']); ?></td>
	      <td><a href="//<?php print $entry['url']; ?>/"><?php print htmlspecialchars($entry['url']); ?></a></td>
	      <td><a href="//<?php print $entry['url']; ?>/wiki/Category:<?php print str_replace('%3A',':',urlencode($entry['category'])); ?>"><?php print htmlspecialchars(str_replace('_', ' ', $entry['category'])); ?></a></td>
              <td style="text-align:right"><?php print $numberOfTitles; ?></td>
            </tr>
<?php
}
?>
	  </tbody>
	</table>
      </div>
    </div>
    <div class="col2">
      <div id="logo">
	<a href="//tools.wmflabs.org/">
          <img src="//tools.wmflabs.org/Tool_Labs_logo_thumb.png" alt="Wikitech and Wikimedia Labs" />
        </a>
      </div>
      <strong>Links</strong>
      <ul>
	<li><a href="https://github.com/dapete42/random-featured" title="GitHub repository dapete42/random-featured">Source code on GitHub</a></li>
      <ul>
    </div>
  </div>
</div>

</body>
</html>
