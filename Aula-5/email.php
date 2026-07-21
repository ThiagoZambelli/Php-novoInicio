<?php


$string=<<<FINAL
teste
muito teste
teste pra caramba
FINAL;
echo $string . PHP_EOL;



function geraEmail(): void
{
    $email = <<<FINAL
    Ola fulano de teste

Você foi incluido no programa de teste, da testesOnline
(assinatura) 
FINAL;

    echo $email;
}

geraEmail();