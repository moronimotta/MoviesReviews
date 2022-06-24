<?php

class JSONAdapter implements ReviewRepository{
    public function __construct()
    {
        
    }

    public function list(){  
        $output = json_decode($this->getData());
        
        return $output;
    }
    public function create(Review $input){
        $dados = $this->list();
        $dados[] = $input;
        file_put_contents(__DIR__."/../reviewsSalvos.json", json_encode($dados));
        
    }

    public function getId(){
        $output = json_decode($this->getData());
        $idMaior = 0;
        foreach($output as $o){
            $idInt = intval($o->id);
            if($idInt > $idMaior){
                $idMaior = $idInt;
            }
        }

        $idInserido = $idMaior + 1;
        return $idInserido;
    }

    private function getData(){
        $dados = file_get_contents(__DIR__."/../reviewsSalvos.json");
        return $dados;
    }
}