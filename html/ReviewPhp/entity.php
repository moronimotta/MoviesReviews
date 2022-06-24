<?php

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="reviews")
*/
class Review
{
    public function __construct(
        /**
         * @ORM\Column(type="string", length=255)
         */
        public string $nome,
        /**
         * @ORM\Column(type="string", length=255)
         */
        public string $email,
        /**
         * @ORM\Column(type="string", length=255)
         */
        public string $review,
        /**
         * @ORM\Column(type="string", length=255)
         */
        public string $imdbID,
        /**
         * @ORM\Column(type="integer")
         */
        public int $rating,
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        public int $id,
        /**
         * @ORM\Column(type="integer")
         */
        public bool $spoiler = false,
    ) {
    }

    //passar isso pra um adapter
    //create schema using Doctrine ORM SchemaTool
    public static function createSchema(Doctrine\ORM\EntityManager $entityManager)
    {
        $tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
        $classes = array(
            $entityManager->getClassMetadata('Review'),
        );
        $tool->createSchema($classes);
    }

    //static method to create a new review object with dummy content
    public static function createDummy()
    {
        return new Review(
            "John Doe",
            "john@test.com",
            "This is a dummy review",
            "tt0111161",
            5,
            1,
        );
    }

    //save review to database
    public function save(Doctrine\ORM\EntityManager $entityManager)
    {
        $entityManager->persist($this);
        $entityManager->flush();
    }
}
