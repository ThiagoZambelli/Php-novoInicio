<?php

namespace Projeto\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador{
    private $httpClient;
    private $crawler;

    public function __construct (ClientInterface $httpClient, Crawler $crawler){
        $this -> httpClient = $httpClient;
        $this -> crawler = $crawler;
    }

    public function buscar(string $url): array{
        $resposta = $this -> httpClient -> request('GET', $url);
        $html = $resposta -> getBody();

        $this -> crawler ->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $curso = [];

        foreach ($elementosCursos as $elemento){
            $curso[] = $elemento->textContent;
        }
        
        return $curso;
    }
}