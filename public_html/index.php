<?php
include_once('../php/init.php');
?>
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
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
                <tr>
            </thead>
	    <tbody>
<?php
foreach ($data as $name => $entry) {
?>
                <tr>
		     <td><a href="redirect/<?php print $name; ?>"><?php print htmlspecialchars($name); ?></a>
                     <td><?php print htmlspecialchars($entry['url']); ?>
                     <td><?php print htmlspecialchars($entry['category']); ?>
                </tr>
<?php
}
?>
	    </tbody>
        </table>
    </body>
</html>