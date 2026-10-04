<?php

namespace App\Entity;

use App\Repository\WalletRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\OneToOne] #[ORM\JoinColumn(nullable: false, unique: true, onDelete: 'CASCADE')] private User $user;
    #[ORM\Column(options: ['default' => 0])] private int $balance = 0;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $updatedAt;
}
