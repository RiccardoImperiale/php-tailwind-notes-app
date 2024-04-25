<?php

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = 'root')
    {
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $dsn = 'mysql:' . http_build_query($config, '', ';'); // shorter way

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []): object
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    function find(): object
    {
        return $this->statement->fetch();
    }
}
