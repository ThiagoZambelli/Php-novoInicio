<?php

$teste = __DIR__ . "/filme.json";
$conteudoJSON = file_get_contents($teste);
$filme = json_decode($conteudoJSON, true);

var_dump($filme);