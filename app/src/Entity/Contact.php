<?php

namespace App\Entity;

use App\Entity\Enum\ContactStatus;
use App\Entity\Enum\PhoneNumberType;
use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $firstName = null;

    #[ORM\Column(length: 128)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $phone_number = null;

    /**
     * @var Collection<int, Group>
     */
    #[ORM\ManyToMany(targetEntity: Group::class)]
    private Collection $contactGroups;

    #[ORM\Column(enumType: ContactStatus::class)]
    private ?ContactStatus $status = null;

    #[ORM\Column(nullable: true, enumType: PhoneNumberType::class)]
    private ?PhoneNumberType $phone_number_type = null;

    public function __construct()
    {
        $this->contactGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * @return Collection<int, Group>
     */
    public function getContactGroups(): Collection
    {
        return $this->contactGroups;
    }

    public function addContactGroup(Group $contactGroup): static
    {
        if (!$this->contactGroups->contains($contactGroup)) {
            $this->contactGroups->add($contactGroup);
        }

        return $this;
    }

    public function removeContactGroup(Group $contactGroup): static
    {
        $this->contactGroups->removeElement($contactGroup);

        return $this;
    }

    public function getStatus(): ?ContactStatus
    {
        return $this->status;
    }

    public function setStatus(ContactStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPhoneNumberType(): ?PhoneNumberType
    {
        return $this->phone_number_type;
    }

    public function setPhoneNumberType(PhoneNumberType $phone_number_type): static
    {
        $this->phone_number_type = $phone_number_type;

        return $this;
    }
}
