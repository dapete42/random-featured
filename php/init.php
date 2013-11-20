<?php

// Include config
include_once ("config.php");

// Allow ZLIB compression of output
ob_start( 'ob_gzhandler' );

// Set time zone
date_default_timezone_set("UTC");

// Use UTF8 for multi-byte string operations
mb_internal_encoding('UTF-8');

?>
