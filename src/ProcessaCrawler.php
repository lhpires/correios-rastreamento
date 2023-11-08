<?php

namespace lhpires\CorreiosRastreamento;

use Symfony\Component\DomCrawler\Crawler;

class ProcessaCrawler
{
   
    static function htmlToJson($html,$filtro,$domc)
    {

        $arrlinks = array();
        $domc->addHtmlContent($html);
        
        $dados = array();


        $arr_rastreio = $domc->filter($filtro);


        if($arr_rastreio->count() > 0){

            foreach($arr_rastreio as $link)
            {
                // array_push($arrlinks, $link->getUri());
    
                $link->lhpires = explode(PHP_EOL,$link->nodeValue);
    
                if((int) count($link->lhpires) > 0){               
    
                    $link->lhpires = array_values(array_filter(array_map("trim",$link->lhpires), function($verificador_nulo) {
                        return strlen(trim($verificador_nulo)) > 0;
                    }));

                
                    
                    $insercao = true;
                    foreach($dados as $validacao)
                    {
                        if($validacao['status'] == $link->lhpires[0] && $validacao['data'] == $link->lhpires[1]){
                            $insercao = false;
                        }
                    }

                    if($insercao === true){
                        array_push($dados,[
                            "status" => $link->lhpires[0],
                            "data" => $link->lhpires[1],
                            "local" => $link->lhpires[2]
                        ]);
                    }
                    unset($insercao);                   
        
                }
            }
    
        }

        echo $dados = json_encode($dados,JSON_UNESCAPED_UNICODE);



    }
}