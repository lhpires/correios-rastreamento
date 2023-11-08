# correios-rastreamento
Facilitador de rastreamento dos Correios por meio da tecnica Crawler

## Instalação
```shell
composer require lhpires/correios-rastreamento
```

Rastreamento de objetos dos Correios

```php
<?php

$ProcessaCrawler = new ProcessaCrawler();
$domc = new Crawler();
$content = file_get_contents("https://www.linkcorreios.com.br/{$seu_codigo}");

$filtro = ".linha_status";

$ProcessaCrawler::htmlToJson($content,$filtro,$domc);

```