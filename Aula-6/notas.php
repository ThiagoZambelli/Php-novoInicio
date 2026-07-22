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
    'Blau'=> null,
];

ksort($notasAlunos);
var_dump($notasAlunos);

function fezAProva(array $array): void
{
    $listaDeAlunos = ["teste", "Thiago", "Pedro", "Alicio"];
    foreach ($listaDeAlunos as $aluno) {
        if (array_key_exists($aluno, $array)) {
            echo PHP_EOL . "O aluno $aluno fez a prova e tirou: $array[$aluno]!";
        } else {
            echo PHP_EOL . "O aluno $aluno não fez a prova!";
        }
    }
}

fezAProva($notasAlunos);

echo PHP_EOL . "-------------------------------" . PHP_EOL;
function fezAProvaNull(array $array): void
{
    $listaDeAlunos = ["teste", "Thiago", "Pedro", "Alicio"];
    foreach ($listaDeAlunos as $aluno) {
        if (isset($aluno, $array)) {
            echo PHP_EOL . "O aluno $aluno fez a prova e tirou: $array[$aluno]!";
        } else {
            echo PHP_EOL . "O aluno $aluno não fez a prova!";
        }
    }
}

fezAProva($notasAlunos);

echo PHP_EOL . "Alguem tirou 10? " . PHP_EOL;
var_dump(in_array("10", $notasAlunos));

echo PHP_EOL . "Quem tirou 10? " . PHP_EOL;
var_dump(array_search("10", $notasAlunos));

// array_key_exists verifica se a chave existe no array
// in_array verifica se o valor existe
// isset verifica se a chave existe e o valor não é nulo
// array_search acha uma key pelo valor