<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields= {"Pseudo"}, message= "Ce pseudo correspond déjà à un utilisateur...")
 */
class User implements UserInterface
{



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Pseudo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(min="8", minMessage="Votre mot de passe est trop court, il doit contenir au moins 8 caractères")
     */
    private $Password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passes ne sont pas identiques...")
     */
    public $Confirm_Password;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function eraseCredentials(){
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles(): array
    {
       
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }


    public function getUsername()
    {
        return $this->Pseudo;
    }

    public function getUserIdentifier()
    {
        return $this->getUsername();
    }
    
}
