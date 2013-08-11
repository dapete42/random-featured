<?php
require_once('../php/classes/TitleDatabase.php');
include_once('../php/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>random-featured</title>
    </head>
    <body>
	<h1>random-featured</h1>
	<p>This is a list of all available random article lists available for this tool.</p>
        <p lang="de">Dies ist eine Liste aller mit diesem Tool verf&uuml;gbaren zuf&auml;lligen Artikellisten.</p>
	<table>
            <thead>
                <tr>
                    <th>Name</th>
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
	             <td><a href="//<?php print $entry['url']; ?>/"><?php print htmlspecialchars($entry['url']); ?></a></td>
	             <td><a href="//<?php print $entry['url']; ?>/wiki/Category:<?php print str_replace('%3A',':',urlencode($entry['category'])); ?>"><?php print htmlspecialchars(str_replace('_', ' ', $entry['category'])); ?></a></td>
                     <td style="text-align:right"><?php print $numberOfTitles; ?></td>
                </tr>
<?php
}
?>
	    </tbody>
	</table>
	<p>Source code is available <a href="https://github.com/dapete42/random-featured" title="GitHub repository dapete42/random-featured">on GitHub</a>.</p>
    </body>
</html>
