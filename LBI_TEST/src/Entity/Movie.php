<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\PostMovieController;
use Doctrine\ORM\Query\Expr\Math;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: MovieRepository::class)]

// declaration en tant que ressource API 
#[ApiResource(
    shortName: "Movies",
    denormalizationContext: ['groups' => ['write:Movie']],
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
        ], 'PostMovie' => [
            'method' => 'POST',
            'path' => '/addMovie',
            'controller' => PostMovieController::class,
            // 'normalization_context' => ['groups' => ['read:collection', 'read:Movie']],
            'denormalization_context' => ['groups' => ['write:Movie']],
            "openapi_context" => [
                "summary" => 'Add a movie',
                'description' => '# add a movie.',
            ]

        ]
    ],

    //config des Operations sur des items
    itemOperations: [
        // Route Custom
        'GetMovie' => [
            'method' => 'GET',
            'path' => '/getMovie/{id}',
            'normalization_context' => ['groups' => ['read:collection', 'read:Movie']],
            "openapi_context" => [
                "summary" => 'Get a single movies',
                'description' => '# Get a single movie including categorie and Peoples.',
            ]
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
    #[Groups(['read:collection', 'read:Movie', 'read:people', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[SerializedName('titre')]
    private ?string $title = null;



    // durée du film
    #[ORM\Column]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[Groups(['read:collection', 'read:Movie', 'write:Movie'])]
    #[SerializedName('duree')]
    private ?int $duration = null;

    // #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    #[Groups(['read:collection', 'write:Movie'])]
    #[SerializedName('staff')]
    #[ORM\OneToMany(targetEntity: MovieHasPeople::class, mappedBy: 'movie', cascade: ["persist"])]
    public $people;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read:collection', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[SerializedName('affiche')]

    private ?string $poster = null;


    public function __construct()
    {
        $this->id = rand(5000 , 50000);
        $this->people = new ArrayCollection();
    }

    public function getPeople()
    {
        return $this->people;
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

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }
}
