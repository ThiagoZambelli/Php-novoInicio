<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

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