<?php

namespace Aula9\Pdo\Domain\Model;

use Aula9\Pdo\Domain\Model\Phone;

class Student
{
    private ?int $id;
    private string $name;
    private \DateTimeInterface $birthDate;
    /**
     * Summary of phones
     * @var Phone[]
     */
    private array $phones;

    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function defineId(int $id): void
    {
        if (!is_null($this->id)) {
            throw new \DomainException(message: 'Você só pode definir o ID uma vez');
        }

        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }

    public function age(): int
    {
        return $this->birthDate
            ->diff(new \DateTimeImmutable())
            ->y;
    }

    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function addPhones(Phone $phone): void
    {
        $this->phones[] = $phone;
    }

    /**
     * Summary of phones
     * @return Phone[]
     */
    public function phones(): array
    {
        return $this->phones;
    }
}
