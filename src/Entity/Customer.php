<?php

namespace App\Entity;

use Assert\NotBlank;
use App\Entity\Reseller;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[ApiResource(cacheHeaders: [
    "max_age" => 60,
    "shared_max_age" => 120,
    "vary" => ["Authorization", "Accept-Language"]
],
normalizationContext:['group'=>['read:collection','read:Reseller']],
itemOperations:[
    'delete',
    'get'
    ],
    attributes: ["pagination_items_per_page" => 2]
    )]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    #[Assert\Regex(
            pattern:"/^[a-zA-Z0-9\-éàèùê'_ç]+$/",
            message:"Votre prénom doit être valide"
    )]
    #[Assert\NotBlank]
    
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern:"/^[a-zA-Z0-9\-éàèùê'_ç]+$/",
       message:"Votre nom doit être valide"
    )]
    #[Assert\NotBlank]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $phoneNumber = null;

    #[ORM\ManyToOne(Reseller::class)]
    private ?Reseller $reseller = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getReseller(): ?Reseller
    {
        return $this->reseller;
    }

    public function setReseller(?Reseller $reseller): self
    {
        $this->reseller = $reseller;

        return $this;
    }
}
