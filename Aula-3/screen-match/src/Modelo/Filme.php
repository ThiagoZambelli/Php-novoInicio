<?php

class Filme {
   
    private array $notas;

    public function __construct(
        private int $anoLancamento, 
        private string $nome, 
        private string $genero)
    {
       $this -> notas = [];
    }

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

    public function genero(): string {
        return $this -> genero;
    }
    
    public function nome(): string {
        return $this -> nome;
    }    
};