<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
#[ApiResource]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]

    #[Groups(['read:collection', 'read:Movie'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:collection', 'read:Movie'])]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['read:collection', 'read:Movie'])]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:collection', 'read:Movie'])]
    private ?string $nationality = null;


    public function __construct()
    {
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

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

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
