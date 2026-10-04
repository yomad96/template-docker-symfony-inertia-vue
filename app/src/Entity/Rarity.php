<?php

namespace App\Entity;

use App\Repository\RarityRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RarityRepository::class)]
class Rarity
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\Column(length: 40, unique: true)] private string $slug;
    #[ORM\Column(length: 80)] private string $label;
    #[ORM\Column] private int $displayOrder;
    #[ORM\Column] private int $duplicateCurrencyValue;
    #[ORM\Column(options: ['default' => true])] private bool $isActive = true;
}
