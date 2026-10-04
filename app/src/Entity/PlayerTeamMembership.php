<?php

namespace App\Entity;

use App\Repository\PlayerTeamMembershipRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerTeamMembershipRepository::class)]
class PlayerTeamMembership
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Player $player;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Team $team;
    #[ORM\Column(type: 'date_immutable')] private \DateTimeImmutable $joinedOn;
    #[ORM\Column(type: 'date_immutable', nullable: true)] private ?\DateTimeImmutable $leftOn = null;
    #[ORM\Column(length: 60, nullable: true)] private ?string $role = null;
}
