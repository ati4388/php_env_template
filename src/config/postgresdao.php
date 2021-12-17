<?php

// $dotEnv = Dotenv::createMutable(dirname(__DIR__));
// $dotEnv->load();

class PostgresDao
{

    private $dbHost;
    private $dbPort;
    private $dbName;
    private $dbUser;
    private $password;

    public function __construct()
    {
        $this->dbHost = $_ENV["DB_HOST"];
        $this->dbName = $_ENV["DB_NAME"];
        $this->dbPort = $_ENV["DB_PORT"];
        $this->dbUser = $_ENV["DB_USER_NAME"];
        $this->password = $_ENV["DB_USER_PASS"];
    }


    public function connect()
    {
        $dsn = "pgsql:host=$this->dbHost;port=$this->dbPort;dbname=$this->dbName;";

        $conn = new PDO($dsn, $this->dbUser, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
