<?php

class Filme {
    private string $nome;
    private int $anoLancamento;
    public string $genero;
    private array $notas = [];

    public function avalia(float $nota): void {
        $this -> notas[] = $nota;
    }

    public function media(): float {
        $somaNotas = array_sum($this -> notas);
        $quantidadeNotas = count($this -> notas);

        return $somaNotas / $quantidadeNotas;
    }

    public function anoLancamento(): int {
        return $this -> anoLancamento;
    }
    public function defineAnoLancamento(int $anoLancamento): void {
        $this -> anoLancamento = $anoLancamento;
    }

    public function genero(): string {
        return $this -> genero;
    }
    public function defineGenero(string $genero): void {
        $this -> genero = $genero;
    }

    public function nome(): string {
        return $this -> nome;
    }
    public function defineNome(string $nome): void {
        $this -> nome = $nome;
    }
};