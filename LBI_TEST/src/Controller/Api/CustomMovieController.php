<?php

namespace App\Controller\Api;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CustomMovieController extends AbstractController
{
    protected $rem;
    public function __construct(EntityManagerInterface $em)
    {
        $this->rem = $em;
    }

        // method magique permettant d'appeller le Controlleur
    public function __invoke(Movie $data): Movie
    {
        return $data;
    }
}
