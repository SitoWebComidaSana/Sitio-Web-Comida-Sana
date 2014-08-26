<?php
include_once('dataBase.php');

// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "root");
<<<<<<< HEAD
define("DB_PASS", "Estud1ante");
define("DB_NAME", "comida");
=======
define("DB_PASS", "root");
define("DB_NAME", "prueba");
>>>>>>> a3fecae8413a96fd1df6e43b6b218b76e7250b8c


class Collector extends dataBase
{
  public static $db;
  private $host      = DB_HOST;
  private $username  = DB_USER;
  private $password  = DB_PASS;
  private $dbname    = DB_NAME;
    
  public function __construct()
  {
    self::$db = new dataBase($this->username, $this->password, $this->host, $this->dbname);
  }

}

?>
