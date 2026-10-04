<?php

namespace App\Entity;

use App\Repository\FriendshipRepository;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FriendshipRepository::class)]
#[ORM\Table(uniqueConstraints: [new ORM\UniqueConstraint(name: 'uniq_friendship_direction', columns: ['requester_id', 'addressee_id'])])]
class Friendship
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[ORM\Column(type: 'uuid', unique: true)]
    private ?Uuid $id = null;

    public function getId(): ?Uuid { return $this->id; }

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $requester;
    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')] private User $addressee;
    #[ORM\Column(length: 20, options: ['default' => 'pending'])] private string $status = 'pending';
    #[ORM\Column(type: 'datetime_immutable', nullable: true)] private ?\DateTimeImmutable $respondedAt = null;
}
