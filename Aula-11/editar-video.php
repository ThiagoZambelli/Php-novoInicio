<?php

use Aula11\Mvc\Model\Video;
use Aula11\Mvc\Repository\VideoRepository;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    header('Location: /');
    exit();
}

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$titulo = filter_input(INPUT_POST, "titulo");

if($url === false || $titulo === false)  {
    header('Location: /');
    exit();
}; 

$video = new Video(url: $url, title: $titulo);
$video->setId($id);

$repository = new VideoRepository($pdo);
$repository->update($video);

header('Location: /');
