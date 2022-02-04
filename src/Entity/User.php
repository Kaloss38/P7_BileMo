<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(
    fields: ['email'],
    message: 'Cette e-mail existe déjà.',
)]
#[ApiResource(
    collectionOperations: [
        "get" => [
            "method" => "get",
            "path" => "/utilisateurs",
            "openapi_context" => [
                "summary" => "Consulter la liste de tous les utilisateurs."
            ]
        ],
        "post" => [
            "method" => "post",
            "path" => "/utilisateurs",
            "openapi_context" => [
                "summary" => "Ajouter un utilisateur lié à un client."
            ]
        ]
    ],
    itemOperations: [
        "get" => [
            "method" => "get",
            "path" => "/utilisateurs/{id}",
            "openapi_context" => [
                "summary" => "Consulter le détail d'un utilisateur lié à un client."
            ]
        ],
        "put" => [
            "method" => "put",
            "path" => "/utilisateurs/{id}",
            "openapi_context" => [
                "summary" => "Modifier un utilisateur lié à un client."
            ]            
        ],
        "delete" => [
            "method" => "delete",
            "path" => "/utilisateurs/{id}",
            "openapi_context" => [
                "summary" => "Supprimer un utilisateur lié à un client."
            ]
        ]
    ]
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre nom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Votre nom doit contenir moins de {{ limit }} caractères',
    )]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre prénom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Votre prénom doit contenir moins de {{ limit }} caractères',
    )]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre e-mail doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Votre e-mail doit contenir moins de {{ limit }} caractères',
    )]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre adresse doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Votre adresse doit contenir moins de {{ limit }} caractères',
    )]
    private $address;

    #[ORM\Column(type: 'integer')]
    private $zip;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Votre ville doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Votre ville doit contenir moins de {{ limit }} caractères',
    )]
    private $city;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private $customer;

    public function __construct()
    {
        $this->setCreatedAt(new DateTimeImmutable());        
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZip(): ?int
    {
        return $this->zip;
    }

    public function setZip(int $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }
    
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
