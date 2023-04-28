<?php
// api/src/Controller/CreateBookPublication.php
namespace App\Controller;

use App\Entity\Movie;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

class GetMovieController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        dd($this->em);
    }

        // method magique permettant d'appeller le Controlleur
    public function __invoke(Movie $data, EntityManagerInterface $em): Movie
    {
        return $data;
    }
}
