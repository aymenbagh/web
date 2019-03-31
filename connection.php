<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $servername="localhost";
    $username="root";
    $password="";
    $dbname="siteweb";
    self::$instance =new mysqli($servername, $username, $password, $dbname);
      }
      return self::$instance;
    }
  }
?>