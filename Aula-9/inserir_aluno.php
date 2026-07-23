<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$caminhoBanco = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $caminhoBanco);

$student = new Student(null, 'Thiago Zambelli', new DateTimeImmutable('1996-10-15'));

$sqlIsert = "INSERT INTO students (name, birth_date) VALUES('{$student->name()}', '{$student->birthDate()->format('y-m-d')}')";
$pdo->exec($sqlIsert);

var_dump($pdo->exec($sqlIsert));