<?php

include_once "database.php";

$thesisId = isset($_GET["thesisId"]) ? $_GET["thesisId"] : "";
if ($thesisId !== "") {
    $database = new Database();
    $connection = $database->connect();
    $query = "SELECT id, title, author, created_at FROM thesis WHERE id = :thesisId";
    $statement = $connection->prepare($query);
    $value = [":thesisId" => $thesisId];
    $statement->execute($value);
    $thesis = $statement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($thesis);
}