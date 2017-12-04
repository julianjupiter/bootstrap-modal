<?php

include_once "database.php";

$database = new Database();
$connection = $database->connect();
$query = "SELECT id, title, author, created_at FROM thesis";
$statement = $connection->prepare($query);
$statement->execute();
$thesisList = $statement->fetchAll(PDO::FETCH_ASSOC);
