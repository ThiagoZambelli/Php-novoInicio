<?php


require_once 'vendor/autoload.php';

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

$sqlDelete = 'DELETE FROM students WHERE id= ?';
$preparedStatment = $pdo->prepare($sqlDelete);

$preparedStatment->bindValue(1, 4, PDO::PARAM_INT);
var_dump($preparedStatment->execute());