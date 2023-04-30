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
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MovieRepository::class)]

// declaration en tant que ressource API 
#[ApiResource(
    shortName: "Movies",
    // config des Operations sur des collections 
    collectionOperations: [
        'GetMovies' => [
            'method' => 'GET',
            'path' => '/getMovies',
            'normalization_context' => ['groups' => ['read:collection', 'read:Movie']],
            "openapi_context" => [
                "summary" => 'Get a collection of movies',
                'description' => '# Get a collection of movies including categorie and Peoples.',
            ]
        ],

    ],

    //config des Operations sur des items
    itemOperations: [
        // Route Custom
        'GetMovie' => [
            'method' => 'GET',
            'path' => '/getMovie/{id}',
            // 'controller' => GetMovieController::class,
            'normalization_context' => ['groups' => ['read:collection', 'read:Movie']],
            "openapi_context" => [
                "summary" => 'Get a single movies',
                'description' => '# Get a single movie including categorie and Peoples.',
            ]
        ],

        // Route Custom
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
    #[Groups(['read:collection', 'read:Movie', 'read:people'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $title = null;



    // durée du film
    #[ORM\Column]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[Groups('read:collection')]
    private ?int $duration = null;

    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    #[Groups('read:collection')]
    #[ORM\OneToMany(targetEntity: MovieHasPeople::class, mappedBy: 'movie')]
    private $people;


    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

    public function getPeople()
    {
        return $this->people;
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
