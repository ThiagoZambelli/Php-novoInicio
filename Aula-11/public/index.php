<?php

declare(strict_types=1);

use Aula11\Mvc\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    Error404Controller,
    NewVideoController,
    VideoFormController,
    VideoListController
};
use Aula11\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';

$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$requestMethod = $_SERVER['REQUEST_METHOD'];

/** @var Controller $controller */

if ($pathInfo === '/') {
    $controller = new VideoListController($videoRepository);

} elseif ($pathInfo === '/novo-video') {
    if ($requestMethod === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } elseif ($requestMethod === 'POST') {
        $controller = new NewVideoController($videoRepository);
    } else {
        $controller = new Error404Controller();
    }

} elseif ($pathInfo === '/editar-video') {
    if ($requestMethod === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } elseif ($requestMethod === 'POST') {
        $controller = new EditVideoController($videoRepository);
    } else {
        $controller = new Error404Controller();
    }

} elseif ($pathInfo === '/remover-video') {
    $controller = new DeleteVideoController($videoRepository);

} else {
    $controller = new Error404Controller();
}

$controller->processaRequisicao();