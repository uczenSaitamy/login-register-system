<?php

namespace Database;

use Exception;

class Database
{
    private $connection;

    private $host;

    private $port;

    private $database;

    private $user;

    private $password;

    public $pdo;

    public function __construct()
    {
        $this->connection = env('DB_CONNECTION', 'mysql');
        $this->host = env('DB_HOST', 'localhost');
        $this->port = env('DB_PORT', '3306');
        $this->database = env('DB_DATABASE', '');
        $this->username = env('DB_USERNAME', 'user');
        $this->host = env('DB_PASSWORD', 'password');

        // $this->connect();
    }

    public function connect()
    {
        try {
            $this->pdo = new \PDO("$this->connection:host=$this->host;dbname=$this->database", $this->user, $this->password);
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }
}
