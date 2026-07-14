<?php
echo "\tBem-vindo(a) ao screen match!\n";

$nomeFilme = "Top Gun - Maverick";
$anoLancamento = 2022;
$somaDeNotas = 9 + 6 + 8 + 7.5 + 5;
$notaFilme = $somaDeNotas / 5;
$incluidoNoPlano = true;



echo "Nome do Filme: " . $nomeFilme . "\n";
echo "Nota Filme: " . $notaFilme;

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