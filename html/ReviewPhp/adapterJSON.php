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
        // 
    }

  

    private function getData(){
        $dados = file_get_contents(__DIR__."/../reviewsSalvos.json");
        return $dados;
    }
}