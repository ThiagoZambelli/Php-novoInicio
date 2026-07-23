<?php

use Aula9\Pdo\Domain\Model\Student;
use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

// fetch utilizado para buscar e imprimir 1 a 1 sem comprometer a memoria

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students');

while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
    $student = new Student(
        id: $studentData['id'], 
        name: $studentData['name'], 
        birthDate:new DateTimeImmutable($studentData['birth_date']
        )); 

    echo $student->age() . PHP_EOL;
};

exit();
