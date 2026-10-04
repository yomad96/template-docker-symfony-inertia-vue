<?php

namespace App\Entity;

use App\Repository\CurrencyTransactionRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyTransactionRepository::class)]
class CurrencyTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private Wallet $wallet;
    #[ORM\Column(length: 32)] private string $kind;
    #[ORM\Column] private int $amount;
    #[ORM\Column] private int $balanceAfter;
    #[ORM\Column(length: 48, nullable: true)] private ?string $sourceType = null;
    #[ORM\Column(type: 'uuid', nullable: true)] private ?\Symfony\Component\Uid\Uuid $sourceId = null;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $createdAt;
}
