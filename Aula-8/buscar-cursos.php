<?php
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$resposta = $client -> request('GET','https://www.alura.com.br/cursos-online-tecnologia?srsltid=AfmBOoqtMQ_jCNcyk2w76dwn7C0Ed0QE43tGgILAzUudJpaEblz81bk_');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler-> addHtmlContent($html);

$cursos = $crawler->filter('span.card-curso__nome');

foreach ($cursos as $curso){
   echo $curso->textContent . PHP_EOL;
}