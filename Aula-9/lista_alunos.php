<?php

use Aula9\Pdo\Domain\Model\Student;
use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData){
    $studentList[] = new Student(
        id: $studentData['id'], 
        name: $studentData['name'], 
        birthDate:new DateTimeImmutable($studentData['birth_date']
        )); 
}

var_dump($studentList);
