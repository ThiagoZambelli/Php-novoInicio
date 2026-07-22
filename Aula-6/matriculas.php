<?php

$alunos2021 = [
    'Maria',
    'Thiago',
    'Zezinho',
    'Alicio',
    'Blau',  
];

$novoAlunos = [
    'Larapio',
    'Liriana',
    "Azura"
];

echo PHP_EOL ."juntando arrays". PHP_EOL;

$alunos2022 = array_merge($alunos2021, $novoAlunos);
var_dump($alunos2022);

echo PHP_EOL ."spred arrays". PHP_EOL;
$alunos2022Dois = [...$alunos2021,'teste', ...$novoAlunos];
var_dump($alunos2022Dois);

echo PHP_EOL ."adicionando elemento no array". PHP_EOL;
array_push($alunos2022, 'pipoca');
$alunos2022[] = 'pipoca2';