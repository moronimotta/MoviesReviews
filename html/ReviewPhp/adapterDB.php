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

    //creates a new review in database using doctrine #CHECKED#
    public function create(Review $input){
        $this->entityManager->persist($input);
        $this->entityManager->flush();
    }

    //gets next autoincrement id from database using doctrine #CHECKED#
    public function getId(){
        $query = $this->entityManager->createQuery('SELECT MAX(reviews.id) FROM Review reviews');
        $id = $query->getResult();
        return $id[0][1];
    }


    //find reviews by imdbID and get average rating #CHECKED#
    public function getRatingAverage(string $imdbID){
        $query = $this->entityManager->createQuery('SELECT AVG(reviews.rating) FROM Review reviews WHERE reviews.imdbID = :imdbID');
        $query->setParameter('imdbID', $imdbID);
        $rating = $query->getResult();
        return $rating[0][1];
    }

    //public function getRatingAverage(){
    //    $query = $this->entityManager->createQuery('SELECT AVG(reviews.rating) FROM Review reviews');
    //    $rating = $query->getResult();
    //    return $rating[0][1];
    //}

  //find reviews by imdbID using doctrine and get the data from database
  public function listByImdbID(string $imdbID){
    $qb = $this->entityManager->createQueryBuilder();
    $query = $qb->select('reviews')
        ->from('Review', 'reviews')
        ->where('reviews.imdbID = :imdbID')
        ->setParameter('imdbID', $imdbID)
        ->getQuery();

    $reviews = $query->getResult();
    return $reviews;
}



    //deletes a review from database using doctrine #CHECKED#
    public function delete($id){
        $findId = $this->entityManager->find('Review', $id);
        $this->entityManager->remove($findId);
        $this->entityManager->flush();
    }  
}