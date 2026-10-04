## Installation symfony

make install-symfony

## Lancer le serveur de développement

make start

# Esport Master

Esport Master est une application web dédiée à la **collection de cartes autour de l'univers esport**.

L'objectif est de proposer une expérience de collection basée sur différentes entités de l'esport : joueurs, équipes, jeux, compétitions et autres éléments emblématiques de la scène compétitive.

Le projet sera construit comme une **application monolithique**, avec Symfony pour le backend et Vue.js pour l'interface via Inertia.js.

## Stack technique

- **Symfony** — backend et logique métier
- **Vue.js** — interface utilisateur
- **Inertia.js** — liaison entre Symfony et Vue sans API séparée
- **PostgreSQL** — base de données
- **Docker** — environnement de développement
- **Mercure** — optionnel, envisagé plus tard pour les fonctionnalités temps réel

## Architecture

L'application restera dans un seul projet :

```text
Symfony
  ↓
Inertia.js
  ↓
Vue.js

PostgreSQL
  ↓
Docker
```

Le projet est actuellement en phase d'initialisation.
