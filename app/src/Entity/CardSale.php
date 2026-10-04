<?php

namespace App\Entity;

use App\Repository\CardSaleRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardSaleRepository::class)]
class CardSale
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $seller;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private UserCard $userCard;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?User $buyer = null;
    #[ORM\Column(length: 16)] private string $visibility;
    #[ORM\Column] private int $price;
    #[ORM\Column(length: 20, options: ['default' => 'active'])] private string $status = 'active';
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $expiresAt;
    #[ORM\Column(type: 'datetime_immutable', nullable: true)] private ?\DateTimeImmutable $completedAt = null;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')] private ?CurrencyTransaction $saleTransaction = null;
}
