<?php
require __DIR__ . "/src/funcoes.php";

echo "Bem-vindo(a) ao screen match!\n";

$nomeFilme = "Top Gun - Maverick";

$anoLancamento = 2022;

$quantidadeDeNotas = $argc - 1;
$notas = [];

for ($contador = 1; $contador < $argc; $contador++) {
    $notas[] = (float) $argv[$contador];
}

$notaFilme = array_sum($notas) / $quantidadeDeNotas;
$planoPrime = true;

$incluidoNoPlano = incluidoNoPlano($planoPrime, $anoLancamento);

echo "Nome do filme: " . $nomeFilme . "\n";
echo "Nota do filme: $notaFilme\n";
echo "Ano de lançamento: $anoLancamento\n";

exibeMenssagemAnoLancamento($anoLancamento);

$genero = match ($nomeFilme) {
    "Top Gun - Maverick" => "ação",
    "Thor: Ragnarok" => "super-herói",
    "Se beber não case" => "comédia",
    default => "gênero desconhecido",
};

echo "O gênero do filme é: $genero\n";

$filme = criaFilme(nome: "Thor: Ragnarok", anoLancamento: 2021, nota: 7.8, genero: "super-herói");


echo $filme["ano"];

//pega a posição de um caractere
$posicaoDoisPontos = strpos($filme['nome'], ":");
var_dump($posicaoDoisPontos);

//faz uma sub string usando a posiçaõ de um caractere
var_dump(substr($filme['nome'],0 , $posicaoDoisPontos));

//teste de parametro por referencia
$estadoCopo = "vazio";


encherCopoNormal($estadoCopo);
echo "\nEstado copo apos encherCopoNormal: " . $estadoCopo;
encherCopoPorReferencia($estadoCopo);
echo "\nEstado copo apos encherCopoPorReferencia: " . $estadoCopo;

echo "\n" . json_encode($filme);

echo "\n";
var_dump(json_decode('{"nome":"Thor: Ragnarok","ano":2021,"nota":7.8,"genero":"super-her\u00f3i"}', true));

$filmeComoStringJSON = json_encode($filme);

file_put_contents(__DIR__ . "/filme.json" , $filmeComoStringJSON);