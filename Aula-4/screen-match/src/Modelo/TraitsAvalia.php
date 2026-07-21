<?php

namespace ScreenMatch\Modelo;

use NotaInvalidaException;

trait TraitsAvalia
{
    private array $notas = [];

    /**
     * @throws \InvalidArgumentException se nota foi menor ou igual a zero ou mano rou maior que 11
     */

    public function avalia(float $nota): void
    {
        if ($nota < 0 || $nota > 10) {
            throw new NotaInvalidaException('nota deve ser entre 1 e 10');
        }
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }
}
