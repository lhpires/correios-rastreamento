<?php
require_once "vendor/autoload.php";


use Symfony\Component\DomCrawler\Crawler;
use lhpires\CorreiosRastreamento\ProcessaCrawler;

$ProcessaCrawler = new ProcessaCrawler();
$domc = new Crawler();

$content = file_get_contents("./ct.html");

$filtro = ".linha_status";

$ProcessaCrawler::htmlToJson($content,$filtro,$domc);
