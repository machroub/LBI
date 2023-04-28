<?php

namespace App\Entity;

// use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieHasPeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
#[ApiResource(
    collectionOperations: [

        'get' => ['normalization_context' => ['groups' => ['read:collection', 'read:Movie']]],
    ]

)]

class MovieHasPeople
{

    // clé composite 
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Movie")]
    #[ORM\JoinColumn(name: "movie_id", referencedColumnName: "id")]
    #[Groups('read:Movie')]
    private $movie;

    // clé composite 
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "App\Entity\People")]
    #[ORM\JoinColumn(name: "people_id", referencedColumnName: "id")]
    #[Groups('read:Movie')]
    private $people;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('read:MovieHasPeople')]
    private ?string $significance = null;


    public function __construct()
    {
    }




    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getSignificance(): ?string
    {
        return $this->significance;
    }

    public function setSignificance(?string $significance): self
    {
        $this->significance = $significance;

        return $this;
    }

    public function getMovie()
    {
        return $this->movie;
    }
    public function getPeople()
    {
        return $this->people;
    }
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }
    public function setPeople($people)
    {
        $this->people = $people;
    }
}
