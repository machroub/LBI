<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MovieHasTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasTypeRepository::class)]
#[ApiResource]
class MovieHasType
{


    // clé composite 
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Movie")]
    #[ORM\JoinColumn(name: "movie_id", referencedColumnName: "id")]
    private $movie;

    // clé composite 
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: "App\Entity\Type")]
    #[ORM\JoinColumn(name: "type_id", referencedColumnName: "id")]
    private $type;



    public function __construct()
    {
    }

    public function getMovie()
    {
        return $this->movie;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setMovie($movie)
    {
         $this->movie= $movie;
    }
    public function setType($type)
    {
         $this->type=$type;
    }

}
