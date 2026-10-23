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
  protected $useHttps;

  public function __construct($userAgent, $domain = 'en.wikipedia.org', $path = 'w', $useHttps = false) {
    $this->userAgent = $userAgent;	      
    $this->urlDomain = $domain;
    $this->urlPath = $path;
    $this->useHttps = $useHttps;
  }

  public function download($category = '', $namespace=0) /* string[] */ {
    $titles = array();
    $from = '';

    do {
      $url = ($this->useHttps ? 'https' : 'http') . '://' . $this->urlDomain . '/' . $this->urlPath . "/api.php?format=json&action=query&list=categorymembers&cmprop=title&cmlimit=500&cmnamespace=$namespace&cmtitle=Category:" . urlencode($category);
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

      // Decode JSON
      $yurik = json_decode($data, true);

      // Safely check if the expected array keys exist before looping
      if (isset($yurik['query']['categorymembers']) && is_array($yurik['query']['categorymembers'])) {
        foreach ($yurik['query']['categorymembers'] as $page) {
          array_push($titles, $page['title']);
        }
      }

      if (isset($yurik['continue']['cmcontinue'])) {
        $from = $yurik['continue']['cmcontinue'];
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
