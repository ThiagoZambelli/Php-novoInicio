<?php

require __DIR__ . "/src/Modelo/Filme.php";
require __DIR__ . "/src/Modelo/Genero.php";

echo "Bem-vindo ao Screen-match! \n";

$filme = new Filme(nome: "Meu filme teste", 
                    anoLancamento: 2021, 
                    genero: Genero::Comedia);

$filme -> avalia(10);
$filme -> avalia(6);
$filme -> avalia(7.8);
$filme -> avalia(8.2);


var_dump($filme);

echo $filme -> media() . "\n";