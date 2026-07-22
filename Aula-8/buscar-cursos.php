<?php
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$resposta = $client -> request('GET','https://cursos.alura.com.br/catalog');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler-> addHtmlContent($html);

$cursos = $crawler->filter('span.search-result__category');

foreach ($cursos as $curso){
   echo $curso->textContent . PHP_EOL;
}