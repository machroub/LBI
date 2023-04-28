<?php
// api/src/Controller/CreateBookPublication.php
namespace App\Controller;

use App\Entity\Movie;
use App\Entity\MovieHasPeople;
use App\Entity\People;
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
    }

    // methode magique permettant d'appeller le Controlleur et de gerer l'orm
    public function __invoke(Movie $data)
    {
        $movie = $this->em->getRepository(MovieHasPeople::class);
        $movie = $movie->findByMovie($data->getId());
        $people = $this->em->getRepository(People::class);
        foreach ($movie as $index => $movi) {
            $people = $people->findById($movi->getPeople()->getId());

            // PUT HERE IMDB API LOGIC : CHECK IF POSTER IS ALREADY IN THE ENTITY FIELDS
            // IF SO RETURN OBEJECT
            // OTHERWISE CALL IMDB API WITH SYMFONY HTTP CLIENT
        }

        return $movie;
    }
}
