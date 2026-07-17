<?php

require __DIR__ . "/src/Modelo/Titulo.php";
require __DIR__ . "/src/Modelo/Genero.php";
require __DIR__ . "/src/Modelo/Filme.php";
require __DIR__ . "/src/Modelo/Serie.php";
require __DIR__ . "/src/Servicos/CalculadoraDeMaratona.php";

echo "Bem-vindo ao Screen-match! \n";

$filme = new Filme(
    nome: "Meu filme teste",
    anoLancamento: 2021,
    genero: Genero::Comedia,
    duracaoEmMinutos: 180
);

$serie = new Serie(
    nome: "Minha serie teste",
    anoLancamento: 2026,
    genero: Genero::Terror,
    temporadas: 8,
    episodiosPorTemporada: 5,
    minutosPorEpisodio: 40,
);

$filme->avalia(10);
$filme->avalia(6);
$filme->avalia(7.8);
$filme->avalia(8.2);

$serie->avalia(10);
$serie->avalia(8.2);


var_dump($filme);
var_dump($serie);

echo "Media serie: " . $serie->media() . "\n";
echo "Media Filme: " . $filme->media() . "\n";

$calculadora = new CalculadoraDeMaratona();

$calculadora->inclui($filme);
$calculadora->inclui($serie);

echo "\nPara maratinar " . $filme->nome . " e " . $serie->nome . " vai levar " . $calculadora->duracao() . " minutos!\n";
