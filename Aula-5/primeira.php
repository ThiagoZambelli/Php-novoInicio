<?php

$nome = "Thiago Zambelli";

$eDaMesmaFamilia = str_contains($nome, "Zambelli");

if($eDaMesmaFamilia) {
    echo "$nome é da minha familia" . PHP_EOL;
} else {
    echo "$nome Não é da minha familia" . PHP_EOL;
}

