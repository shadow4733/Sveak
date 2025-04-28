<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity]
#[ORM\Table(name: "client")]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $lastName = null;

    #[ORM\Column(length: 12)]
    #[Assert\Regex(pattern: "/^(\+7|7|8)[0-9]{10}$/", message: "Неверный формат номера телефона")]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $education = null;

    #[ORM\Column]
    private ?bool $consent = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    public function getId()
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): void
    {
        $this->score = $score;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEducation()
    {
        return $this->education;
    }

    public function setEducation($education): void
    {
        $this->education = $education;
    }

    public function getConsent()
    {
        return $this->consent;
    }

    public function setConsent($consent): void
    {
        $this->consent = $consent;
    }

}