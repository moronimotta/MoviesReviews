<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../db/entityManager.php";

require_once("entity.php");

class DBAdapter implements ReviewRepository{
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = getEntityManager();
    }

    //gets reviews from database using doctrine
    public function list(){  
        $query = $this->entityManager->createQuery('SELECT * FROM Review reviews');
        $reviews = $query->getResult();
        return $reviews;
    }

    //creates a new review in database using doctrine
    public function create(Review $input){
        $this->entityManager->persist($input);
        $this->entityManager->flush();
    }

    //gets next autoincrement id from database using doctrine
    public function getId(){
        $query = $this->entityManager->createQuery('SELECT MAX(reviews.id) FROM Review reviews');
        $id = $query->getResult();
        return $id[0][1];
    }



    
}