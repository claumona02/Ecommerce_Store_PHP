<?php

$connection = require_once "C:\wamp64\www\proiectphp\backend\conection.php";

$sql = "SELECT * FROM produse;";
$results = $connection->query($sql);
$items = $results->fetchAll(PDO::FETCH_ASSOC);
$items_json = json_encode($items);

echo $items_json;
