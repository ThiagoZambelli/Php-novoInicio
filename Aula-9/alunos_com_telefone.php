<?php

use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Aula9\Pdo\Infrastructure\Repository\PdoStudentRepository;

require 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

$studentList = $repository-> studentsWithPhones();

var_dump($studentList);

