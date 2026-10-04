<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\Column(length: 80, unique: true)] private string $slug;
    #[ORM\Column(length: 120)] private string $displayName;
    #[ORM\Column(length: 2, nullable: true)] private ?string $countryCode = null;
}
