<?php

class Filme extends Titulo {   

    public function __construct(
        int $anoLancamento, 
        string $nome, 
        Genero $genero,      
        public readonly int $duracaoEmMinutos)       
    {  
        parent::__construct(nome: $nome, anoLancamento: $anoLancamento, genero: $genero);
    }

};