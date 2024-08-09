<?php

class Database {
    public $connection;

    public function __construct($config, $username = "hariom", $password="om123")
    {
        $dsn = "mysql:". http_build_query($config, "", ";");
        // dd($dsn);
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection =  new PDO($dsn, username: $username, password: $password, options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query) {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement -> fetchAll();
    }
}