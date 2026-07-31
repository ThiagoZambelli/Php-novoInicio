<?php

use Aula11\Mvc\Model\Video;
use Aula11\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, "titulo");

if($url === false || $titulo === false)  {
    header('Location: /');
    exit();
};

$repository = new VideoRepository($pdo);
$retorno = $repository->add(new Video(url:$url, title: $titulo));

header('Location: /');

