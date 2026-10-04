<?php

namespace App\Entity;

use App\Repository\CardEditionRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardEditionRepository::class)]
class CardEdition
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Game $game;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false)] private Rarity $rarity;
    #[ORM\Column(length: 16)] private string $subjectKind;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Player $player = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Team $team = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Champion $champion = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?GameItem $gameItem = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Team $featuredTeam = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Competition $competition = null;
    #[ORM\Column(length: 80, nullable: true)] private ?string $seasonLabel = null;
    #[ORM\Column(length: 160)] private string $title;
    #[ORM\Column(length: 255)] private string $imagePath;
    #[ORM\Column(length: 20, options: ['default' => 'draft'])] private string $publicationStatus = 'draft';
    #[ORM\Column(type: 'datetime_immutable', nullable: true)] private ?\DateTimeImmutable $publishedAt = null;
}
