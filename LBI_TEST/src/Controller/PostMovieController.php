<?php
// api/src/Controller/CreateBookPublication.php
namespace App\Controller;

use ApiPlatform\Api\QueryParameterValidator\Validator\Length;
use App\Entity\Movie;
use App\Entity\MovieHasPeople;
use App\Entity\People;
use App\Repository\MovieRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class PostMovieController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // methode magique permettant d'appeller le Controlleur et de gerer l'orm
    public function __invoke($data)
    {
        for ($i = 0; $i < count($data->people); $i++) {
            $data->people[$i]->setMovie($data);
        }
        // dd($data);
        $this->em->persist($data);
        $this->em->flush();
        return $data;
    }
}
