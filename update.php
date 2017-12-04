<?php

include_once "database.php";

$thesisId = isset($_POST["thesisId"]) ? $_POST["thesisId"] : "";
$thesisTitle = isset($_POST["thesisTitle"]) ? $_POST["thesisTitle"] : "";
$thesisAuthor = isset($_POST["thesisAuthor"]) ? $_POST["thesisAuthor"] : "";
if ($thesisAuthor !== "" && $thesisAuthor !== "") {
    $database = new Database();
    $connection = $database->connect();
    $query = "UPDATE thesis SET title = :title, author = :author WHERE id =:thesisId";
    $statement = $connection->prepare($query);
    $values = [":title" => $thesisTitle, ":author" => $thesisAuthor, ":thesisId" => $thesisId];
    $statement->execute($values);
    $rowCount = $statement->rowCount();
    echo json_encode(["rowCount" => $rowCount]);
}