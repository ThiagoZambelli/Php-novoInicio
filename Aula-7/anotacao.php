<?php
// Escalares
$string = "texto";
$int = 27;
$float = 15.3;
$bool = true;

// Composto
$array = [$int, $float, $bool, $string];

// conversão de tipo

// type cast
$valorNumerico = '27';
$valorInteiro = (int) $valorNumerico;

$valorDecimal = 27.5;
$valorInteiro = (int) $valorDecimal;

$opcao = '3';

$menuSelecionado = match ($opcao) {
    '1' => 'Saldo',
    '2' => 'Deposito',
    '3' => 'Saque',
    '4' => 'Sair',
    default => null,
};

echo PHP_EOL . $menuSelecionado . PHP_EOL;

var_dump(match(true){
    true => 1,
    false => 0,
});

// ternario
$novaNota= -2;

$nota = $novaNota > 0 ? $novaNota : 0; 

echo PHP_EOL . "nota: " . $nota  . PHP_EOL;