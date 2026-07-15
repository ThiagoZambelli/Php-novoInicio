<?php

$saldo = 1.000;
$titularConta = "thiago zambelli";
$opcao = 0;

do {
    echo  "\n" . "**********************" . "\n";
    echo "Titular: " . $titularConta . "\n"; 
    echo "**********************". "\n";

    echo "1. Consultar Saldo Atual\n";
    echo "2. Sacar\n";
    echo "3. Depositar\n";
    echo "4. Sair\n";

    $opcao = (int) fgets(STDIN);

    switch ($opcao) {
        case 1:
            echo "**********************" . "\n";

            echo "Titular: " . $titularConta . "\n";
            echo "Saldo Atual: R$ " . $saldo . "\n"; 

            echo "**********************". "\n";
            break;

        case 2:
            echo "**********************" . "\n";

            echo "Qual valor deseja sacar?\n";
            $valor = (int) fgets(STDIN);
            if($valor > $saldo){
                echo "Saldo insuficiente !\n";
            } else {
                $saldo -= $valor;
                echo "Saldo Atual: R$ " . $saldo . "\n"; 
            }

            echo "**********************". "\n";
            break;

        case 3:
            echo "**********************" . "\n";

            echo "Qual valor deseja depositar?\n";
            $valor = (int) fgets(STDIN);
            if($valor < 0){
                echo "valor invalido.\n O deposito deve ser maior que R$ 0.0!\n";
            } else {
                $saldo += $valor;
                echo "Saldo Atual: R$ " . $saldo . "\n"; 
            }

            echo "**********************". "\n";
            break;    
        default:
            echo "Opção invalida!\n";
            break;
    };
} while ($opcao != 4);

