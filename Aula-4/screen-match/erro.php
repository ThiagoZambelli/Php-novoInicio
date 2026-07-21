<?php

require 'autoload.php';

use ScreenMatch\Modelo\Serie;
use ScreenMatch\Modelo\Genero;
use ScreenMatch\Modelo\Episodio;
use ScreenMatch\Servicos\ConversorNotaEstrela;

$serie = new Serie(nome: 'Nome serie', anoLancamento: 2023, genero: Genero::Comedia, temporadas: 7, episodiosPorTemporada: 20, minutosPorEpisodio: 30);
$episodio = new Episodio(serie: $serie, nome: 'Piloto', numero: 1);

try {
    $episodio->avalia(45);
    $episodio->avalia(-35);

    $conversor = new ConversorNotaEstrela();

    echo $conversor->converte($episodio);
} catch (Exception $e) {
    echo "um problema rolou: " , $e -> getMessage();
}