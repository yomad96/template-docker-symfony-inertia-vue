<?php

namespace App\Entity;

use App\Repository\CardSetRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardSetRepository::class)]
#[ORM\Table(uniqueConstraints: [new ORM\UniqueConstraint(name: 'uniq_card_set_game_slug', columns: ['game_id', 'slug'])])]
class CardSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Game $game;
    #[ORM\Column(length: 80)] private string $slug;
    #[ORM\Column(length: 160)] private string $name;
    #[ORM\Column(length: 160)] private string $theme;
    #[ORM\Column(length: 80, nullable: true)] private ?string $periodLabel = null;
    #[ORM\Column(length: 20, options: ['default' => 'draft'])] private string $publicationStatus = 'draft';
}
