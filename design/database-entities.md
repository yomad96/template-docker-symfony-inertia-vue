# Entites de la base de donnees

Ce document decrit les entites Doctrine actuellement declarees dans `app/src/Entity`.
Chaque entite a une cle primaire `id` au format UUID, generee par le composant Symfony UID et stockee par Doctrine avec le type `uuid`.

## Identite et social

### User

**Attributs :** `id`, `email` (unique), `username` (unique), `roles`, `password`, `avatarPath` (nullable), `createdAt`, `updatedAt`.

Represente un compte de joueur ou d'administrateur. C'est l'entite racine pour l'authentification, la collection, le portefeuille, les amis, les ouvertures de packs et les ventes.

### Friendship

**Attributs :** `id`, `requester` (User), `addressee` (User), `status` (par defaut `pending`), `respondedAt` (nullable).

Represente une demande d'ami entre deux joueurs. Elle permet de verifier que deux utilisateurs sont bien amis avant de leur autoriser une vente de carte.

## Univers esport

### Game

**Attributs :** `id`, `slug` (unique), `name`, `isActive`.

Represente un jeu competitif, par exemple League of Legends. Il permet de demarrer avec LoL tout en gardant le modele pret pour Valorant, Counter-Strike ou un autre jeu plus tard.

### Organization

**Attributs :** `id`, `slug` (unique), `name`, `logoPath` (nullable).

Represente une organisation esport globale, comme T1 ou G2 Esports. Une organisation peut posseder plusieurs equipes, potentiellement dans plusieurs jeux.

### Team

**Attributs :** `id`, `game` (Game), `organization` (Organization, nullable), `slug`, `name`, `isActive`.

Represente une equipe dans un jeu donne, par exemple l'equipe League of Legends de T1. Son unicite est prevue par couple `game + slug`.

### Player

**Attributs :** `id`, `slug` (unique), `displayName`, `countryCode` (nullable).

Represente une personne qui joue ou a joue dans l'esport, par exemple Faker. Ses changements d'equipe ne modifient pas ses anciennes cartes : ils sont conserves dans les adhesions d'equipe.

### PlayerTeamMembership

**Attributs :** `id`, `player` (Player), `team` (Team), `joinedOn`, `leftOn` (nullable), `role` (nullable).

Conserve l'historique d'un joueur dans une equipe. Cette entite permet de savoir quelle equipe il representait pendant une periode donnee, y compris pour des cartes retrospectives.

### Champion

**Attributs :** `id`, `game` (Game), `slug`, `name`.

Represente un personnage jouable d'un jeu, par exemple Ahri dans League of Legends. Il peut etre le sujet d'une edition de carte.

### GameItem

**Attributs :** `id`, `game` (Game), `slug`, `name`.

Represente un objet appartenant a un jeu, par exemple la Coiffe de Rabadon. Il peut lui aussi etre le sujet d'une edition de carte.

### Competition

**Attributs :** `id`, `game` (Game), `slug`, `name`, `region` (nullable).

Represente une competition, par exemple les Worlds ou la LCK. Une edition de carte peut s'y rattacher pour figer son contexte historique.

## Catalogue de cartes

### Rarity

**Attributs :** `id`, `slug` (unique), `label`, `displayOrder`, `duplicateCurrencyValue`, `isActive`.

Definit une rarete, comme commune, rare, epique ou legendaire. Elle porte aussi la valeur de conversion accordee lorsqu'un joueur tire un doublon.

### CardEdition

**Attributs :** `id`, `game` (Game), `rarity` (Rarity), `subjectKind`, `player` (nullable), `team` (nullable), `champion` (nullable), `gameItem` (nullable), `featuredTeam` (nullable), `competition` (nullable), `seasonLabel` (nullable), `title`, `imagePath`, `publicationStatus`, `publishedAt` (nullable).

Represente une carte collectionnable precise, et non son sujet generique : par exemple « Faker - T1 - Worlds 2025 - legendaire ». `subjectKind` indique si son sujet est un joueur, une equipe, un champion ou un objet ; une seule des quatre relations de sujet doit etre renseignee selon cette valeur.

### CardSet

**Attributs :** `id`, `game` (Game), `slug`, `name`, `theme`, `periodLabel` (nullable), `publicationStatus`.

Represente une serie officielle a completer, par exemple « T1 2026 » ou « Champions iconiques ». Son unicite est prevue par couple `game + slug`.

### CardSetCard

**Attributs :** `id`, `cardSet` (CardSet), `cardEdition` (CardEdition), `position` (nullable).

Est la table de liaison entre une serie et une edition de carte. Elle permet a une meme carte d'appartenir a plusieurs collections et, si besoin, de lui donner un ordre dans une serie.

## Collection et monnaie

### UserCard

**Attributs :** `id`, `owner` (User), `cardEdition` (CardEdition), `acquiredAt`, `state` (par defaut `owned`).

Represente l'exemplaire actuellement detenu par un joueur. La contrainte `owner + cardEdition` assure qu'un joueur ne possede pas deux fois la meme edition : un doublon est donc converti en monnaie plutot que conserve.

### Wallet

**Attributs :** `id`, `user` (User, unique), `balance` (par defaut `0`), `updatedAt`.

Represente le portefeuille de monnaie d'un joueur. Il y en a exactement un par utilisateur et son solde est la valeur rapide a afficher dans l'interface.

### CurrencyTransaction

**Attributs :** `id`, `wallet` (Wallet), `kind`, `amount`, `balanceAfter`, `sourceType` (nullable), `sourceId` (UUID nullable), `createdAt`.

Conserve le journal des mouvements de monnaie : conversion de doublon, achat ou vente. Il explique l'origine de chaque variation de solde et rend l'economie verifiable en cas de bug ou de litige.

## Packs et ouvertures

### PackDefinition

**Attributs :** `id`, `game` (Game), `slug` (unique), `name`, `cardsPerOpen`, `publicationStatus`.

Represente la recette d'un type de pack, par exemple le pack quotidien League of Legends. Il fixe notamment le jeu concerne et le nombre de cartes revelees a chaque ouverture.

### PackSlot

**Attributs :** `id`, `packDefinition` (PackDefinition), `position`, `minimumRarity` (Rarity, nullable), `rarityWeights` (JSON).

Decrit un emplacement dans un pack et ses regles de rarete. Par exemple, les premiers emplacements peuvent utiliser des probabilites normales et le dernier imposer une carte rare ou meilleure ; l'unicite est prevue par `packDefinition + position`.

### PackOpening

**Attributs :** `id`, `user` (User), `packDefinition` (PackDefinition), `source`, `openedAt`, `ruleSnapshot` (JSON).

Represente l'evenement « un joueur a ouvert un pack ». `ruleSnapshot` garde les regles appliquees a cet instant pour que l'historique reste comprehensible si les probabilites evoluent plus tard.

### PackOpeningResult

**Attributs :** `id`, `packOpening` (PackOpening), `cardEdition` (CardEdition), `userCard` (UserCard, nullable), `resultKind`, `currencyAmount` (nullable), `createdAt`.

Represente une carte revelee dans une ouverture. Si la carte est nouvelle, elle peut pointer vers le `UserCard` cree ; si c'est un doublon, `resultKind` indique la conversion et `currencyAmount` memorise le montant obtenu.

### DailyPackClaim

**Attributs :** `id`, `user` (User), `packOpening` (PackOpening, unique), `claimedAt`, `nextAvailableAt`.

Represente la reclamation d'une recompense quotidienne et l'ouverture associee. `nextAvailableAt` permet de verifier qu'un joueur attend bien 24 heures avant la reclamation suivante.

## Ventes entre amis

### CardSale

**Attributs :** `id`, `seller` (User), `userCard` (UserCard), `buyer` (User, nullable), `visibility`, `price`, `status`, `expiresAt`, `completedAt` (nullable), `saleTransaction` (CurrencyTransaction, nullable).

Represente une carte mise en vente contre la monnaie du jeu. La vente peut etre privee pour un acheteur precise ou visible aux amis du vendeur ; elle conserve son prix, son statut, son expiration et la transaction de monnaie lorsqu'elle est finalisee.

## Regles a appliquer dans le code metier

- Une `CardEdition` doit referencer exactement un sujet parmi `player`, `team`, `champion` et `gameItem`, coherent avec `subjectKind`.
- Une `CardSale` ne doit etre acceptee que si vendeur et acheteur sont amis, si la carte est encore disponible, si l'acheteur ne la possede pas et si son portefeuille couvre le prix.
- Un `DailyPackClaim` ne doit etre cree que lorsque `nextAvailableAt` de la derniere reclamation est depasse.
- Lorsqu'un doublon est tire, il faut creer un `PackOpeningResult` de conversion et une `CurrencyTransaction`, sans creer de second `UserCard`.
