<?php

namespace App\Entity;

// use ApiPlatform\Metadata\ApiResource;

use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\MovieHasPeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
class MovieHasPeople
{

    // clé composite 
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Movie", inversedBy: 'people', cascade: ["persist"])]
    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    #[ORM\JoinColumn(name: "movie_id", referencedColumnName: "id", nullable: false)]

    private $movie;

    // clé composite 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\ManyToOne(targetEntity: "App\Entity\People", inversedBy: 'movie', cascade: ["persist"])]
    #[ORM\JoinColumn(name: "people_id", referencedColumnName: "id", nullable: false)]
    #[ApiFilter(SearchFilter::class, strategy: 'exact')]
    #[Groups(['read:Movie', 'write:Movie'])]
    private $people;

    #[Groups(['read:Movie', 'write:Movie'])]
    #[ORM\Column(length: 255)]
    #[SerializedName('poste')]
    private ?string $role = null;

    #[Groups(['read:Movie', 'write:Movie'])]
    #[ORM\Column(length: 255, nullable: true)]
    #[SerializedName('type')]
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
