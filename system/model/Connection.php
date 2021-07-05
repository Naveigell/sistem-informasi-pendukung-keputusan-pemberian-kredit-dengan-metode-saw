<?php
namespace System\Model;

class Connection {
    private $host       = 'localhost';
    private $name       = 'name';
    private $user       = 'root';
    private $password   = '';

    private $connection;

    public function __construct()
    {
        $this->host     = DB_HOST;
        $this->name     = DB_NAME;
        $this->user     = DB_USER;
        $this->password = DB_PASSWORD;

        $this->connect();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function connect(){
        try {
            $this->connection = new \PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }
}