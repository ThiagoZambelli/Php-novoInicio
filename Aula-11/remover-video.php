<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET["id"];

$sql = 'DELETE FROM videos WHERE id = ?;';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();

header('Location: /index.php');
