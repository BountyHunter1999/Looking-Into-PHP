<?php

class Database {
    public $connection;
    public $statement;

    public function __construct($config, $username = "hariom", $password="om123")
    {
        $dsn = "mysql:". http_build_query($config, "", ";");
        // dd($dsn);
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection =  new PDO($dsn, username: $username, password: $password, options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params=[]) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result = $this->find();
        if (! $result) {
            return abort();
        }
        return $result;
    }

    public function get() {
        return $this->statement->fetchAll();
    }
}