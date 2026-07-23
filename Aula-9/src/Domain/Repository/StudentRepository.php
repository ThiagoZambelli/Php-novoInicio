<?php

namespace Aula9\Pdo\Domain\Repository;

use Aula9\Pdo\Domain\Model\Student;
use DateTimeInterface;

interface StudentRepository
{

    public function allStudents(): array;
    public function studantsBirthAt(DateTimeInterface $birthDate): array;
    public function save(Student $student): bool;
    public function remove(Student $student): bool;
}
