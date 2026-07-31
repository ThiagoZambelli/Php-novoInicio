<?php

use Aula11\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET["id"];

$repository = new VideoRepository($pdo);
$repository->remove($id);


header('Location: /');
