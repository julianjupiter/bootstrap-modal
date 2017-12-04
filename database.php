<?php

class Database
{
    private $connection;
    
    public function __construct()
    {
        try
        {
            $dbProvider = 'mysql';
            $dbHost = 'localhost';
            $dbPort = '3306';
            $dbSchema = 'topacdb';
            $dbCharSet = 'utf-8';
            $dbUser = 'root';
            $dbPassword = 'admin';
            $dns = $dbProvider . ':host=' . $dbHost . ';port=' . $dbPort . ';dbname=' . $dbSchema . ';char-set='. $dbCharSet;
            $this->connection = new PDO($dns, $dbUser, $dbPassword);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->connection;
    }
}