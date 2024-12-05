# PokeTeams

PokeTeams est une application web permettant de créer des équipes Pokémon et de voir les faiblesses globales de celles-ci.

## Dépendenses

- PHP >= 8.2.4
- Composer >= 2.8.2
- Node.js >= 18.20.4
- MariaDB >= 10.5.26

## Lancement en local

1. Clonage du dépot

```bash
git clone https://github.com/HE-Arc/PokeTeams.git
cd PokeTeams
```

2. Installation des dépendenses

```bash
composer install
npm install
```

3. Configuration de l'environement

Chargement de la config de base
```bash
cp .env.example .env
```

Changement des paramètres pour correspondre à l'environnement local
- DB_PASSWORD

4. Génération de la clé d’application

```bash
php artisan key:generate
```

5. Migration et seeding de la base de données

```bash
php artisan migrate:fresh --seed
```

6. Démarrage du serveur

```bash
npm run dev
php artisan serve
```
