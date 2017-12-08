<?php

include_once "database.php";

$thesisId = isset($_GET["thesisId"]) ? $_GET["thesisId"] : "";
if ($thesisId !== "") {
    $database = new Database();
    $connection = $database->connect();
    $query = "DELETE FROM thesis WHERE id =:thesisId";
    $statement = $connection->prepare($query);
    $value = [":thesisId" => $thesisId];
    $statement->execute($value);
    $rowCount = $statement->rowCount();
    echo json_encode(["rowCount" => $rowCount]);
}