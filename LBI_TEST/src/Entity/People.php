<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\PeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
#[ApiResource(
    shortName: 'Peoples',
    description: "liste du staff d'un film",
    collectionOperations: [
        'GetPeople' => [
            'method' => 'GET',
            'path' => '/getPeoples',
            'normalization_context' => ['groups' => ['read:collection', 'read:peoples']],
            "openapi_context" => [
                "summary" => 'Get a collection of people',
                'description' => '# Get a collection of movies including their movies ',
            ]
        ],

    ],

    //config des Operations sur des items
    itemOperations: [
        // Route Custom
        'Getpeople' => [
            'method' => 'GET',
            'path' => '/getPeople/{id}',
            'normalization_context' => ['groups' => ['read:collection', 'read:peoples']],
            "openapi_context" => [
                "summary" => 'Get a single people',
                'description' => '# Get a single people including his movies',
            ]
        ],
    ]

)]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 255)]

    #[Groups(['read:collection', 'read:Movie', 'read:people', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class)]
    #[SerializedName('prenom')]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:collection', 'read:Movie', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class)]
    #[SerializedName('nom')]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['read:collection', 'read:Movie', 'read:people', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class)]
    #[SerializedName('naissance')]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:collection', 'read:Movie', 'write:Movie'])]
    #[ApiFilter(SearchFilter::class)]
    #[SerializedName('nationalite')]

    private ?string $nationality = null;

    #[OneToMany(targetEntity: MovieHasPeople::class, mappedBy: 'people')]
    private Collection $movie;

    public function __construct()
    {
        $this->movie = new ArrayCollection();
    }

    public function getMovie()
    {
        return $this->movie;
    }


    // methode magique __toString permet de serialisé la 'jointure'
    public function __toString()
    {
        $format = "Participation (Id: %s, %s, %s,%s)\n";
        return sprintf($format, $this->firstname, $this->lastname, $this->date_of_birth, $this->nationality);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        if ($this->date_of_birth) {
            return $this->date_of_birth->format('Y-m-d');
        }
        return 'none';
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        if ($this->date_of_birth) {

            $this->date_of_birth = $date_of_birth->format('Y-m-d');
        }

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }
}
