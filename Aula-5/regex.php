<?php

$telefones = [
    '(51) 99999 - 9999',
    '(51) 88888 - 8888',
    '(51) 77777 - 7777',
];

foreach ($telefones as $telefone) {
    $telefoneValido = preg_match("/\([0-9]-{2}\) 9?[0-9]{4}/", $telefone);
    if ($telefoneValido) {
        echo "telefone valido" . PHP_EOL;
    } else {
        echo "telefone não valido". PHP_EOL;
    }
}