<?php

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

$dbPath = __DIR__ . "/../banco.sqlite";

$buider = new ContainerBuilder();
$buider->addDefinitions([
    PDO::class => \DI\create(PDO::class)->constructor("sqlite:$dbPath")
]);


/**
 * @var ContainerInterface $container
 */
$container = $buider->build();

return $container;
