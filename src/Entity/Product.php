<?php

namespace App\Entity;

use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[UniqueEntity(
    fields: ['name'],
    message: 'Ce produit existe déjà.',
)]
#[ApiResource(
    itemOperations: [
        "get" => [
            "method" => "get",
            "path" => "produits/{id}",
            "openapi_context" => [
                "summary" => "Récupérer un produit"
            ]
        ]
    ],
    collectionOperations: [
        "get" => [
            "method" => "get",
            "path" => "/produits",
            "openapi_context" => [
                "summary" => "Récupérer tous les produits"
            ]
        ]
    ]
)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le nom doit contenir moins de {{ limit }} caractères',
    )]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull]
    #[Assert\Type(
        type: 'integer',
        message: "Le prix {{ value }} n'est pas valide .",
    )]
    private $price;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le fabricant doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le fabricant doit contenir moins de {{ limit }} caractères',
    )]
    private $manufacturer;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    #[Assert\Type(
        type: 'integer',
        message: "L'année de fabrication {{ value }} n'est pas valide .",
    )]
    private $fabricationYear;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    public function __construct()
    {
        $this->setCreatedAt(new DateTimeImmutable());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getFabricationYear(): ?int
    {
        return $this->fabricationYear;
    }

    public function setFabricationYear(int $fabricationYear): self
    {
        $this->fabricationYear = $fabricationYear;

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
}
