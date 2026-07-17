<?php

require __DIR__ . "/src/Modelo/Filme.php";

echo "Bem-vindo ao Screen-match! \n";

$filme = new Filme();
$filme -> defineNome("Meu filme teste");
$filme -> defineAnoLancamento(2021);
$filme -> defineGenero("Comedia");

$filme -> avalia(10);
$filme -> avalia(6);
$filme -> avalia(7.8);
$filme -> avalia(8.2);


var_dump($filme);

echo $filme -> media() . "\n";