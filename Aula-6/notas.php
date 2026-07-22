<?php

$notas = [1, 10, 5, 9, 4, 7];

// ordena de forma decrescente 
rsort($notas);
var_dump($notas);

// Ordena de forma decrescente os resultados mas mantendo os indicies originais
arsort($notas);
var_dump($notas);


// -----------------------------------
// oredena pelas chaves
$notasAlunos = [
    'Maria' => '10',
    'Thiago' => '11',
    'Zezinho' => '7',
    'Alicio' => '7',
];

ksort($notasAlunos);
var_dump($notasAlunos);
