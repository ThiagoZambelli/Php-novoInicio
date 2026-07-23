<?php

use Aula9\Pdo\Domain\Model\Student;
use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';


$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Teste da silva',
    new DateTimeImmutable('1982-10-15')
);


$sqlIsert = "INSERT INTO students (name, birth_date) VALUES(:name , :birth_date)";
$statement = $pdo->prepare($sqlIsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));



if($statement->execute()){
    echo PHP_EOL . "Aluno inserido!" . PHP_EOL;
} else {
    echo PHP_EOL . "deu zebra" . PHP_EOL;
}