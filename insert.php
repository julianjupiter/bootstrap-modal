<?php

include_once "database.php";

$thesisTitle = isset($_POST["thesisTitle"]) ? $_POST["thesisTitle"] : "";
$thesisAuthor = isset($_POST["thesisAuthor"]) ? $_POST["thesisAuthor"] : "";
if ($thesisAuthor !== "" && $thesisAuthor !== "") {
    $database = new Database();
    $connection = $database->connect();
    $query = "INSERT INTO thesis(title, author) VALUES(:title, :author)";
    $statement = $connection->prepare($query);
    $values = [":title" => $thesisTitle, ":author" => $thesisAuthor];
    $statement->execute($values);
    $lastInsertId = $connection->lastInsertId();
    echo json_encode(["id" => $lastInsertId]);
}