<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false) {
    header('Location: /index.php');
    exit();
}

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, "titulo");

if($url === false || $titulo === false)  {
    header('Location: /index.php');
    exit();
}; 


$sql = 'UPDATE videos SET url=:url, title=:title WHERE id = :id;';
$statement = $pdo->prepare($sql);
$statement->bindValue(':url', $url);
$statement->bindValue(':title', $titulo);
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: /index.php');
