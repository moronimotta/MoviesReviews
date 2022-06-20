<?php
include_once "useCases.php";

class ReviewController
{
    private $interactor;
    public function __construct()
    {
        $this->interactor = new ReviewUseCases("JSON");
    }

    public function list(){
        return $this->interactor->list();
    }

    public function create($item){
        return $this->interactor->create($item);
    }

    public function listByImdbID(string $imdbID){
        return $this->interactor->listByImdbID($imdbID);
    }
}
