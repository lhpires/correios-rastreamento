<?php
require_once "vendor/autoload.php";

use Symfony\Component\DomCrawler\Crawler;
use lhpires\CorreiosRastreamento\ProcessaCrawler;

$ProcessaCrawler = new ProcessaCrawler();
$domc = new Crawler();

// $content = file_get_contents("./ct.html");
$content = file_get_contents("https://www.linkcorreios.com.br/OZ210054658BR");

$filtro = ".linha_status";

$jsonRastreio = $ProcessaCrawler::htmlToJson($content,$filtro,$domc);

echo "<pre>";
var_dump($jsonRastreio);
echo "</pre>";
