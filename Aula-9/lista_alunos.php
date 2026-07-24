<?php


use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Aula9\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);
$studentList = $repository->allStudents();


var_dump($studentList);
