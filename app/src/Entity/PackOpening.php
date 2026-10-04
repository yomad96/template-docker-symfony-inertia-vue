<?php

namespace App\Entity;

use App\Repository\PackOpeningRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackOpeningRepository::class)]
class PackOpening
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $user;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false)] private PackDefinition $packDefinition;
    #[ORM\Column(length: 32)] private string $source;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $openedAt;
    #[ORM\Column(type: 'json')] private array $ruleSnapshot = [];
}
