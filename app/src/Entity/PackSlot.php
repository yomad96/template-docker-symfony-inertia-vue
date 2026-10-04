<?php

namespace App\Entity;

use App\Repository\PackSlotRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackSlotRepository::class)]
#[ORM\Table(uniqueConstraints: [new ORM\UniqueConstraint(name: 'uniq_pack_slot_position', columns: ['pack_definition_id', 'position'])])]
class PackSlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private PackDefinition $packDefinition;
    #[ORM\Column] private int $position;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?Rarity $minimumRarity = null;
    #[ORM\Column(type: 'json')] private array $rarityWeights = [];
}
