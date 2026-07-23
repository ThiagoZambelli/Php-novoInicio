<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'src/Buscador.php';

use GuzzleHttp\Client;
use Projeto\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$crawler= new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar("https://www.alura.com.br/cursos-online-tecnologia?srsltid=AfmBOoqtMQ_jCNcyk2w76dwn7C0Ed0QE43tGgILAzUudJpaEblz81bk_");

foreach ($cursos as $curso){
   echo $curso . PHP_EOL;
}