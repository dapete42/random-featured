<?php

/*
  Note: This file uses UTF8 encoding. You might encounter problems if you
  don't use that encoding.

  Copyright (c) 2008 Peter Schlömer

  Released under the GNU General Public License (GPL), version 2. See
  LICENSE for the full text.
*/

class MediawikiQueryCategoryTitleDownloader {

  protected $userAgent;
  protected $urlDomain;
  protected $urlPath;

  public function __construct($userAgent, $domain = 'en.wikipedia.org', $path = 'w') {
    $this->userAgent = $userAgent;	      
    $this->urlDomain = $domain;
    $this->urlPath = $path;
  }

  public function download($category = '', $namespace=0) /* string[] */ {
    $titles = array();
    $from = '';

    do {
      $url = 'http://' . $this->urlDomain . '/' . $this->urlPath . "/api.php?format=php&action=query&list=categorymembers&cmprop=title&cmlimit=500&cmnamespace=$namespace&cmtitle=Category:" . urlencode($category);
      if ($from !== '') {
        $url .= "&cmcontinue=" . urlencode($from);
      }

      // Download with CURL
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
      $data = curl_exec($ch);
      curl_close($ch);

      // Regain the serialized array data
      $yurik = unserialize($data);

      // Loop through all pages
      if (count(@$yurik['query']['categorymembers']) > 0) {
        foreach ($yurik['query']['categorymembers'] as $page) {
          array_push ($titles, $page['title']);
        }
      }

      if (@$yurik['query-continue']['categorymembers']['cmcontinue']) {
        $from = $yurik['query-continue']['categorymembers']['cmcontinue'];
      }
      else {
        $from = '';
      }
    }
    while ($from);

    return $titles;
  }

}

?>
