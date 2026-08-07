<?php

declare(strict_types=1);

return [
    'GET|/' => \Aula13\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \Aula13\Mvc\Controller\VideoFormController::class,
    'POST|/novo-video' => \Aula13\Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => \Aula13\Mvc\Controller\VideoFormController::class,
    'POST|/editar-video' => \Aula13\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \Aula13\Mvc\Controller\DeleteVideoController::class,
    'GET|/login' => \Aula13\Mvc\Controller\LoginFormController::class,
    'POST|/login' => \Aula13\Mvc\Controller\LoginController::class,
    'GET|/logout' => \Aula13\Mvc\Controller\LogoutController::class,
];
