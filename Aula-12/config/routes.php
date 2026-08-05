<?php

declare(strict_types=1);

return [
    'GET|/' => \Aula12\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \Aula12\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => \Aula12\Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => \Aula12\Mvc\Controller\VideoFormController::class,
    'POST|/editar-video' => \Aula12\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \Aula12\Mvc\Controller\DeleteVideoController::class,
    'GET|/login' => \Aula12\Mvc\Controller\LoginFormController::class,
    'POST|/login' => \Aula12\Mvc\Controller\LoginController::class,
];
