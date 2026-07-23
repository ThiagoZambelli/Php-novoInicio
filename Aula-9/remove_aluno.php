<?php

use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;
require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$sqlDelete = 'DELETE FROM students WHERE id= ?';
$preparedStatment = $pdo->prepare($sqlDelete);

$preparedStatment->bindValue(1, 4, PDO::PARAM_INT);
var_dump($preparedStatment->execute());