<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\MovieRepository;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\GetMovieController;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MovieRepository::class)]

// declaration en tant que ressource API 
#[ApiResource(
    // config des Operations sur des collections 
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => ['read:collection']]],

    ],
    //config des Operations sur des items
    itemOperations: [

        'get' => ['normalization_context' => ['groups' => ['read:collection']]],

        // Route Custom
        'GetMovie' => [
            'method' => 'GET',
            'path' => '/moviecustom/{id}',
            'controller' => GetMovieController::class,
        ],

        // Route Custom
        'GetMyMovie' => [
            'method' => 'GET',
            'path' => '/mynewmovie/{id}',
            'controller' => GetMovieController::class,
        ]
    ]
)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    // titre du film
    #[ORM\Column(length: 255)]
    #[Groups(['read:collection', 'read:Movie'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $title = null;



    // durée du film
    #[ORM\Column]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[Groups('read:collection')]
    private ?int $duration = null;


    public function __construct()
    {
    }


    // methode magique __toString permet de serialisé la 'jointure'
    public function __toString()
    {
        $format = "Participation (Id: %s, %s, %s,%s)\n";
        return sprintf($format, $this->title, $this->duration);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }



    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
