<?php
echo "\tBem-vindo(a) ao screen match!\n";

$nomeFilme = "Top Gun - Maverick";
$anoLancamento = 2022;
$somaDeNotas = 0;
$incluidoNoPlano = true;

for ($i = 1; $i < $argc; $i ++) {
    $somaDeNotas += $argv[$i];
};


$quantidadeDeNotas = $argc - 1;
$notaFinal = $somaDeNotas / $quantidadeDeNotas;

echo "Nome do Filme: " . $nomeFilme . "\n";
echo "Nota Filme: " . $notaFinal . "\n";

if ($anoLancamento > 2022) {
    echo "Esse filme é um lançamento\n";
} elseif($anoLancamento > 2020 && $anoLancamento <= 2022) {
    echo "Esse filme ainda é novo\n";
} else {
    echo "Esse filme não é um lançamento\n";
}

$genero = match ($nomeFilme) {
    "Top Gun - Maverick" => "ação",
    "Thor: Ragnarok" => "super-herói",
    "Se beber não case" => "comédia",
    default => "gênero desconhecido",
};

echo "O gênero do filme é: $genero";

$filme = [
    "Thor: Ragnarock",
    2021,
    7.8,
    "super-heroi"
];

$testeArray = [
    "a",
    "b",
    1,
    2,
    3
];

echo var_dump($testeArray);


