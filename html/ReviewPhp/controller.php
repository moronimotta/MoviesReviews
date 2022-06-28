<?php
include_once "useCases.php";

class ReviewController
{
    private $interactor;
    public function __construct(string $adapter) //JSON ou DB
    {
        $this->interactor = new ReviewUseCases($adapter);
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

    public function delete($id) {
        return $this->interactor->delete($id);
    }

    public function getRatingAverage(string $imdbID){
        return $this->interactor->getRatingAverage($imdbID);
    }
}
