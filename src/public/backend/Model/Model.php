<?php

class Model {
    public $pdo;
    public function __construct() {
        $dbUser = getenv('MYSQL_USER');
        $dbPass = getenv('MYSQL_PASSWORD');
        $dbName = getenv('MYSQL_DATABASE');
        $this->pdo = new PDO('mysql:dbname=askNicely;host=mysql', 'admin', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
