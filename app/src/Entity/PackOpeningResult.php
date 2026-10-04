<?php

namespace App\Entity;

use App\Repository\PackOpeningResultRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackOpeningResultRepository::class)]
class PackOpeningResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private PackOpening $packOpening;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false)] private CardEdition $cardEdition;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?UserCard $userCard = null;
    #[ORM\Column(length: 16)] private string $resultKind;
    #[ORM\Column(nullable: true)] private ?int $currencyAmount = null;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $createdAt;
}
