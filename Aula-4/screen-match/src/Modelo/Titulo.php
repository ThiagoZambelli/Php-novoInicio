<?php

abstract class titulo implements Avaliavel
{
    use TraitsAvalia;
    public function __construct(
        public readonly int $anoLancamento,
        public readonly string $nome,
        public readonly Genero $genero,
    ) {
        $this->notas = [];
    }

    abstract public function duracaoEmMinutos(): int;
}