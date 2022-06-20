<?php

class Review
{
    public function __construct(
        public string $nome,
        public string $email,
        public string $review,
        public string $imdbID,
        public int $rating,
        public string $id,
        public bool $spoiler = false,
    ) {}
}
