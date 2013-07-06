<?php

// Include config
include_once ("config.php");
include_once ("functions.php");

// Allow ZLIB compression of output
ob_start( 'ob_gzhandler' );

// Set time zone
date_default_timezone_set("UTC");

?>