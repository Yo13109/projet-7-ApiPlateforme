<?php

namespace App\Entity;

use App\Entity\Reseller;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[ApiResource(normalizationContext:['group'=>['read:collection','read:Reseller']],
itemOperations:[
    'delete',
    'get'=>[
        'normalization_context'=>['group'=>['read:collection','read:Reseller']]
    ]
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
    #[Groups(['read:Reseller'])]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:Reseller'])]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:Reseller'])]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:Reseller'])]
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
