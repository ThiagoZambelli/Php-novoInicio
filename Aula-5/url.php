<?php

$url = "https://teste.com.br";

// Manipulador de String que faz uma verificação no inicio da String

if(str_starts_with($url,"https")){
    echo "é uma URL segura";
} else {
    echo "não é uma URL segura";
}

echo PHP_EOL;
// Manipulador de String que faz uma verificação no final da String
if(str_ends_with($url,"br")){
    echo "é uma URL Brasileira";
} else {
    echo "não é uma URL Brasileira";
}

echo PHP_EOL;