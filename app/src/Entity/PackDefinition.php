<?php

namespace App\Entity;

use App\Repository\PackDefinitionRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackDefinitionRepository::class)]
class PackDefinition
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Game $game;
    #[ORM\Column(length: 80, unique: true)] private string $slug;
    #[ORM\Column(length: 120)] private string $name;
    #[ORM\Column] private int $cardsPerOpen;
    #[ORM\Column(length: 20, options: ['default' => 'draft'])] private string $publicationStatus = 'draft';
}
