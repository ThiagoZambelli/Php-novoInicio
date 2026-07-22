<?php

$notas = [
    "10","9","7","8.5","9","8","10",
];


$notasOesordenadas = $notas;
sort($notasOesordenadas);

echo PHP_EOL . "Desordenadas: ";
var_dump($notas);

echo PHP_EOL . "Oesordenadas: ";
var_dump($notasOesordenadas);

// ---------------------------------------------------


$notasAlunos = [
    [
        'aluno' => 'Maria',
        'nota'=> '10',
    ],
    [
        'aluno' => 'Thiago',
        'nota'=> '11',
    ],
    [
        'aluno' => 'Zezinho',
        'nota'=> '7',
    ]
];

// ordenador para usort completo
function ordenaNotas(array $nota1, array $nota2){
    if($nota1['nota'] > $nota2['nota']){
        return -1;
    }if($nota1['nota'] < $nota2['nota']){
        return 1;
    }
    return 0;
};

// ordenador para usort de forma otimizada 
function ordenaNotasEficiente(array $nota1, array $nota2){
    return $nota2['nota'] <=> $nota1['nota'];
};

usort($notasAlunos, 'ordenaNotasEficiente');
echo PHP_EOL . "Notas Alunos: ";
var_dump($notasAlunos);
