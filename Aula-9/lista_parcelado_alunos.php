<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

// fetch utilizado para buscar e imprimir 1 a 1 sem comprometer a memoria

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

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
