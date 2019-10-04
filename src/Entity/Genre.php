<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
        /**
     * @ORM\ManyToMany(targetEntity="Serie", mappedBy="lesGenres")
     */
    private $lesSeries;
    public function __construct()
    {
        $this->lesSeries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSeries(): \Doctrine\Common\Collections\Collection
    {
        return $this->lesSeries;
    }

    public function addSerie(Categorie $serie)
    {
        $this->lesSeries[] = $serie;
    }

    public function removeSerie(Categorie $serie)
    {
        // removeElement est une méthode de la classe ArrayCollection
        $this->lesSeries->removeElement($serie);
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleGenre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleGenre(): ?string
    {
        return $this->libelleGenre;
    }

    public function setLibelleGenre(string $libelleGenre): self
    {
        $this->libelleGenre = $libelleGenre;

        return $this;
    }
}