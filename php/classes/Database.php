<?php

/*
  Note: This file uses UTF8 encoding. You might encounter problems if you
  don't use that encoding.

  Copyright (c) 2006 Peter Schlömer

  Released under the GNU General Public License (GPL), version 2. See
  LICENSE for the full text.
*/

abstract class Database {

  protected $dbHost;
  protected $dbUsername;
  protected $dbPassword;
  protected $database;

  protected $dbResource;
  protected $connected;

  public function __construct($host, $username, $password, $database) {
    $this->dbHost = $host;
    $this->dbUsername = $username;
    $this->dbPassword = $password;
    $this->database = $database;
    $this->connected = false;
  }

  public function __destruct() {
    $this->disconnect();
  }

  public function connect() {
    if (!$this->connected) {
      $this->connectBase();
      if ($this->dbResource) {
        $this->connected = true;
        return true;
      }
      else  {
        return false;
      }
    }
  }

  protected abstract function connectBase();

  public function disconnect() {
    if ($this->connected) {
      $this->disconnectBase();
      $this->connected = false;
    }
  }

  protected abstract function disconnectBase();

  public function isConnected() /* boolean */ {
    return $this->connected;
  }

  public abstract function query() /* resource */;

  public abstract function fetch_array ($result);

  public abstract function escape ($string);

  public function escapeString ($string) {
    return "'" . $this->escape($string) . "'";
  }

}

?>