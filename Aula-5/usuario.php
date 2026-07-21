<?php

$email = "thiagozamoliveira@gmail.com";
$senha = "123";
$nome = "Thiago Zambelli";


$tamanhoSenha = strlen($senha);

echo substr($email,0,17) . PHP_EOL;
echo substr($email,17) . PHP_EOL;

// pega a posição exata de um caractere na String
$posicaoDoArroba = strpos($email,"@");
// corta a string a partir de um referencial de inicio e de fim
echo substr($email,0,$posicaoDoArroba) . PHP_EOL;
echo substr($email,$posicaoDoArroba) . PHP_EOL;


if ($tamanhoSenha <8) {
    echo PHP_EOL . "Senha não é segura". PHP_EOL;
}

$usuario = substr($email,0,$posicaoDoArroba);

echo mb_strtoupper($usuario) . PHP_EOL;
echo strtolower($usuario) . PHP_EOL;

$nomeComAcento = "thíago";
echo strtoupper($nomeComAcento) . PHP_EOL;
echo $tamanho=mb_strlen($nomeComAcento);
// Explode, separa uma string usando um "separador de referencia" e o list poe cada valor em uma variavel
list($nome, $sobrenome) = explode(' ', $nome);
echo PHP_EOL . "nome: ". $nome . PHP_EOL . "sobrenome: " . $sobrenome .PHP_EOL;

