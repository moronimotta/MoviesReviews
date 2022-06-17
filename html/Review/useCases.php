<?php
include_once "entity.php";
include_once "adapterJSON.php";

interface ReviewRepository{
    public function list();
    public function create(Review $input);
}

class ReviewUseCases{
    private ReviewRepository $adapter;
    public function __construct(string $repository)
    {
        if ($repository == "JSON") {
            $this->adapter = new JSONAdapter();
        }

    }

    public function list(){
        $arr = $this->adapter->list();
        $output = array();

        foreach($arr as $item){
            $i = new Review($item->nome,$item->email,$item->review,$item->imdbID,$item->rating,$item->spoiler);
            $output[] = $i;

        }
        return $output;
    }

    public function create($item){
        if($item->nome == null){
            return false;
        }
        $i = new Review($item->nome,$item->email,$item->review,$item->imdbID,$item->rating,$item->spoiler);
        $this->adapter->create($i);
        return true;
    }

    public function listByImdbID(string $imdbID){
        $dados = $this->list();
        $output = array();
        foreach($dados as $item){
            if($item->imdbID == $imdbID){
                $output[] = $item;
            }
        }
        return $output;
    }
}