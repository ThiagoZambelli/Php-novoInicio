<?php

use Aula9\Pdo\Domain\Model\Student;
use Aula9\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Aula9\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once __DIR__ . '/vendor/autoload.php';

$conection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($conection);

$conection->beginTransaction();

try {
    $aStudent = new Student(id: null, name: "Testolino JR.", birthDate: new DateTimeImmutable('1992-06-01'));
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(id: null, name: "Tetolinaria da silva", birthDate: new DateTimeImmutable('1999-06-01'));
    $studentRepository->save($anotherStudent);

    $conection->commit();
} catch (\RuntimeException $e) {
    echo $e->getMessage();
    $conection->rollback();
};
