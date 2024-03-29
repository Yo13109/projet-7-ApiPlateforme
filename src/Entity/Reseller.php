<?php

namespace App\Entity;

use Assert\Email;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ResellerRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ResellerRepository::class)]
#[UniqueEntity(fields:'email',message:"l'email que vous avez indiqué est déjà utilisé !")]
#[ApiResource(cacheHeaders: [
        "max_age" => 60,
        "shared_max_age" => 120,
        "vary" => ["Authorization", "Accept-Language"]
    ],
    normalizationContext:['groups'=> ['list:reseller']],
    denormalizationContext:['groups'=>['create:reseller']],
    itemOperations: [
        'get'
    ],
    collectionOperations:[
        'post'
    ],
)]
class Reseller implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    #[Groups(['create:reseller'])]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Groups(['list:reseller','create:reseller'])]
    #[Assert\Email]
    #[Assert\NotBlank]
    private ?string $email = null;

    #[ORM\Column]
    #[Ignore]
    private array $roles = [];

    /**
     * @var string The hashed password
     * 
     */
    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Groups(['create:reseller'])]
    #[Assert\Regex(
        pattern: "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)^[a-zA-Z\d]{8,}$/",
        message:"Votre mot de passe doit contenir une Majuscule, une minuscule et 8 caractères minimum !"
         )]
    #[Assert\Length(
              min : 8,
              max : 255,
              minMessage : "Votre mot de passe doit comporter au moins  {{ limit }} caratères",
              maxMessage : "Votre mot de passe ne peut pas dépasser  {{ limit }} caractères"
         )]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Groups(['list:reseller','create:reseller'])]
    #[Assert\NotBlank()]
    private ?string $company = null;

    #[ORM\OneToMany(mappedBy: 'reseller', targetEntity: Customer::class)]
    #[Ignore]
    private Collection $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection<int, Customer>
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(Customer $customer): self
    {
        if (!$this->customers->contains($customer)) {
            $this->customers[] = $customer;
            $customer->setReseller($this);
        }

        return $this;
    }

    public function removeCustomer(Customer $customer): self
    {
        if ($this->customers->removeElement($customer)) {
            // set the owning side to null (unless already changed)
            if ($customer->getReseller() === $this) {
                $customer->setReseller(null);
            }
        }

        return $this;
    }
}
