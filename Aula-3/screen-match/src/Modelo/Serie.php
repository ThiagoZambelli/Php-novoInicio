<?php

class Serie extends Titulo  {

    public function __construct(
        int $anoLancamento, 
        string $nome, 
        Genero $genero,     
        public readonly int $temporadas,
        public readonly int $episodiosPorTemporada,
        public readonly int $minutosPorEpisodio)       
    {  
        parent::__construct(nome: $nome, anoLancamento: $anoLancamento, genero: $genero);
    }   
   
}