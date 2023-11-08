<?php
require_once "vendor/autoload.php";

use Symfony\Component\DomCrawler\Crawler;
use lhpires\CorreiosRastreamento\ProcessaCrawler;

$ProcessaCrawler = new ProcessaCrawler();
$domc = new Crawler();

$codigo = (isset($_GET['codigo'])) ? $_GET['codigo'] : "";

$content = file_get_contents("https://www.linkcorreios.com.br/{$codigo}");

$filtro = ".linha_status";

$jsonRastreio = $ProcessaCrawler::htmlToJson($content,$filtro,$domc);

echo "<pre>";
var_dump($jsonRastreio);
echo "</pre>";

?>