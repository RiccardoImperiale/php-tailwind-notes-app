<?php

class Database
{
    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=8889;dbname=php_tailwind_app;user=root;password=root;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query($query): object
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
