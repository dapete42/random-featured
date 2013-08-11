<?php

/*
  Note: This file uses UTF8 encoding. You might encounter problems if you
  don't use that encoding.

  Copyright (c) 2008 Peter Schlömer

  Released under the GNU General Public License (GPL), version 2. See
  LICENSE for the full text.
*/

require_once('Database.php');

class TitleDatabase {

  protected $filename;

  public function __construct($filename) {
    $this->filename = $filename;
  }

  public function randomTitle() /* array() */  {
    $titles = $this->loadTitlesRaw();
    $line = rand(0,count($titles));
    $title = $titles[$line];
    return substr($title,0,strlen($title)-1);
  }

  public function loadTitlesRaw() /* array() */  {
    $titles = array();
    if (file_exists($this->filename)) {
      $titles = file($this->filename);
    }
    return $titles;
  }

  public function deleteTitles () {
    $f = fopen($this->filename, 'w');
    fclose($f);
  }

  public function saveTitles($titles = array()) {
    $f = fopen($this->filename, 'w');
    foreach ($titles as $t) {
      fwrite ($f, "$t\n");
    }
    fclose($f);
  }

  public function numberOfTitles() {
    $f = fopen($this->filename, 'r');
    $lines = 0;
    while(!feof($f)) {
      $line = fgets($f);
      $lines++;
    }
    fclose($f);
    return $lines;
  }

}

?>
