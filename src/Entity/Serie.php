<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerieRepository")
 */
class Serie
{
    /**
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="lesSeries")
     */
    private $lesGenres;
    public function __construct()
    {
        $this->lesGenres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getGenres(): \Doctrine\Common\Collections\Collection
    {
        return $this->lesGenres;
    }

    public function addGenre(Categorie $genre)
    {
        $this->lesGenres[] = $genre;
    }

    public function removeGenre(Categorie $genre)
    {
        // removeElement est une méthode de la classe ArrayCollection
        $this->lesGenres->removeElement($genre);
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $premiereDiffusion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

        /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $nbEpisode;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPremiereDiffusion(): ?\DateTimeInterface
    {
        return $this->premiereDiffusion;
    }

    public function setPremiereDiffusion(?\DateTimeInterface $premiereDiffusion): self
    {
        $this->premiereDiffusion = $premiereDiffusion;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getLesGenres(): Collection
    {
        return $this->lesGenres;
    }

    public function addLesGenre(Genre $lesGenre): self
    {
        if (!$this->lesGenres->contains($lesGenre)) {
            $this->lesGenres[] = $lesGenre;
        }

        return $this;
    }

    public function removeLesGenre(Genre $lesGenre): self
    {
        if ($this->lesGenres->contains($lesGenre)) {
            $this->lesGenres->removeElement($lesGenre);
        }

        return $this;
    }

    public function getNbEpisode(): ?int
    {
        return $this->nbEpisode;
    }

    public function setNbEpisode(?int $nbEpisode): self
    {
        $this->nbEpisode = $nbEpisode;

        return $this;
    }

    public function getDureeTotale()
    {
        $tempsTotal= $this->getNbEpisode()*(date_timestamp_get($this->getDuree())/60);

        return $tempsTotal;
    }

}
