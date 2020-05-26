<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SearchSerieRepository")
 */
class SearchSerie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    private $genres;
    private $maxDuree;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
    }

    public function getGenres(): ?ArrayCollection
    {
        return $this->genres;
    }

    public function setGenres(ArrayCollection $genres): void
    {
        $this->genres = $genres;
    }

    public function getMaxDuree(): ?DateTime
    {
        return $this->maxDuree;
    }

    public function setMaxDuree(?DateTime $uneDuree): SearchSerie
    {
        $this->maxDuree = $uneDuree;
        return $this;
    }
}
