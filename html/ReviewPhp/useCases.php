<?php
include_once "entity.php";


interface ReviewRepository{
    public function list();
    public function create(Review $input);
    public function getId();
}

class ReviewUseCases{
    private ReviewRepository $adapter;
    public function __construct(string $repository)
    {
        if ($repository == "JSON") {
            include_once "adapterJSON.php";
            $this->adapter = new JSONAdapter();
        }

        if ($repository == "DB") {
            include_once "adapterDB.php";
            $this->adapter = new DBAdapter();
        }

    }

    public function list(){
        $arr = $this->adapter->list();
        $output = array();
        

        foreach($arr as $item){
            $i = new Review($item->nome,$item->email,$item->review,$item->imdbID,$item->rating,$item->id,$item->spoiler);
            $output[] = $i;

        }
        return $output;
    }

    public function create($item){
        if($item->nome == null){
            return false;
        }
        
        $id = $this->adapter->getId();
        $item->id = $id;
        
        //assign $item to new Review object
        $review = new Review($item->nome,$item->email,$item->review,$item->imdbID,$item->rating,$item->id,$item->spoiler);

        $this->adapter->create($review);
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

    public function delete($id){
        $dados = $this->list();
        $input = [];
        foreach($dados as $item){
            if($item->id === $id) {
                // unset($dados[$key]);
                continue;
            }

            $input[] = $item;
        }
        
        //#TODO: passar pro adapter
        var_dump($dados);
        file_put_contents(__DIR__."/../reviewsSalvos.json", json_encode($input));
    }
}