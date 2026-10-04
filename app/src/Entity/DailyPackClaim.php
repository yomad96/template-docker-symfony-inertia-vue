<?php

namespace App\Entity;

use App\Repository\DailyPackClaimRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DailyPackClaimRepository::class)]
class DailyPackClaim
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $user;
    #[ORM\OneToOne] #[ORM\JoinColumn(nullable: false, unique: true, onDelete: 'CASCADE')] private PackOpening $packOpening;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $claimedAt;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $nextAvailableAt;
}
