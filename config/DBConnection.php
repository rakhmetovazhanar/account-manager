<?php
  
include_once('db.php');

class DBConnection {
  public $host = DB_HOST;
  public $user = DB_USER;
  public $name = DB_NAME;
  public $password = DB_PASSWORD;

  private $pdo;

  public function __construct() {
    $this->dbConnect();
  }

  public function dbConnect() {
    try {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
      $this->pdo = new PDO($dsn, $this->user, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $err) {
      die($err->getMessage());
    }
}

  public function getPdo() {
    return $this->pdo;
  }
}


?>