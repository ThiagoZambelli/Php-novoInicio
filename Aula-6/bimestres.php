<?php

$notasBimestre1 = [
    'Maria' => '10',
    'Thiago' => '11',
    'Zezinho' => '7',
    'Alicio' => '7',
    'Blau'=> '9',  
];

$notasBimestre2 = [
    'Maria' => '7',
    'Thiago' => '10',
    'Zezinho' => '8',
    'Alicio' => '9',    
];

// cria um novo array com todos os keys que tem no primeiro argumento mas n tem no segundo
var_dump(array_diff_key($notasBimestre1, $notasBimestre2));
// cria um novo array com todas os valores que tem no primeiro mas n tem no segundo 
var_dump(array_diff($notasBimestre1, $notasBimestre2));
// cria um novo array comparrando chave e valor em ambos os arrays
var_dump(array_diff_assoc($notasBimestre1, $notasBimestre2));

echo PHP_EOL . "alunos faltantes --------------";
$alunosFaltantes = array_diff_key($notasBimestre1, $notasBimestre2);
var_dump(array_keys($alunosFaltantes));

echo PHP_EOL . "invertendo chave por valor --------------";
var_dump(array_flip($notasBimestre1));