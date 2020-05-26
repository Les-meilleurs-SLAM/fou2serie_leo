<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt()
    // Peut être utilise dans certaines methodes de chiffrement.
    // On ne l’utilisera pas ici donc on renvoie null
    {
        return null;
    }

    public function getRoles()
    // Cette méthode renvoie la liste des rôles de l’utilisateur
    // dans notre cas, on ne gère pas plusieurs rôles donc on va simplement renvoyer un tableau avec le role administrateur (ROLE_ADMIN)
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    // Peut permettre de supprimer des informations sensibles qui auraient été stockées dans l’entité
    // Dans notre cas, il n’y a pas d’informations sensibles donc on laisse le corps de cette méthode vide
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    // Fonction qui sert à transformer notre objet en chaîne 
    {
        return serialize(array(
            $this->id,
            $this->username, $this->password,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    // Fonction qui sert à convertir une chaîne en objet 
    {
        list(
            $this->id,
            $this->username, $this->password,
        ) = unserialize($serialized);
    }
}
