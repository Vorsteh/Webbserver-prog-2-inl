<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $connection;

    private $stmt;

    public function __construct($config, $username = 'root', $password = 'admin')
    {

        $config = require(base_path('config.php'));

        $dsn = "mysql:" . http_build_query($config['database'], '', ';');
        //$dsn = "mysql:host={$config['database']['host']};dbname={$config['database']['dbname']};charset=utf8mb4";

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = [])
    {
        try {
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
            return $this;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function all()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            die("Record not found.");
        }
        return $result;
    }
}
