<?php

namespace App\Entity;

use App\Repository\UserCardRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserCardRepository::class)]
#[ORM\Table(uniqueConstraints: [new ORM\UniqueConstraint(name: 'uniq_user_card_edition', columns: ['owner_id', 'card_edition_id'])])]
class UserCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $owner;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private CardEdition $cardEdition;
    #[ORM\Column(type: 'datetime_immutable')] private \DateTimeImmutable $acquiredAt;
    #[ORM\Column(length: 20, options: ['default' => 'owned'])] private string $state = 'owned';
}
