<?php

declare(strict_types=1);

use Aula13\Mvc\Controller\Error404Controller;
use Aula13\Mvc\Repository\VideoRepository;
use Psr\Http\Server\RequestHandlerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
/**
 * @var \Psr\Container\ContainerInterface $diContainer
 */
$diContainer = require_once __DIR__ . '/../config/dependencis.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

\session_start();
$isLoginRoute = $pathInfo === "/login";
if (!array_key_exists("logado", $_SESSION) && !$isLoginRoute) {
    header("Location: /login");
    return;
}

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = $diContainer->get($controllerClass);
} else {
    $controller = new Error404Controller();
}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, //ServerRequesetFactory
    $psr17Factory, //UriFactory
    $psr17Factory, //UploadedFileFactory
    $psr17Factory  //StreamFerctory
);
$request = $creator->fromGlobals();

/** @var RequestHandlerInterface $controller */
$response = $controller->handle($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
