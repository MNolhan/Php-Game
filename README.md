# 🐾 Jeu PHP - Gestion d'Animaux

Bienvenue dans ce petit jeu PHP dans lequel vous incarnez un gardien d’animaux. Vous pouvez **créer des animaux**, **les nourrir**, et faire face à des **événements aléatoires** tels que des attaques de **chasseurs** ou de **voleurs**. Saurez-vous garder vos animaux en vie et vos provisions intactes ?

## 📜 Règles du jeu

- Vous pouvez **créer plusieurs animaux**, chacun ayant un nom, une faim, et un état de santé.
- Vous disposez d'un **stock de provisions** à utiliser pour nourrir vos animaux.
- À chaque tour, un **événement aléatoire** peut se produire :
  - 🧑‍🌾 Le **chasseur** peut tuer un de vos animaux.
  - 🦹‍♂️ Le **voleur** peut voler une partie de vos provisions.
- Nourrissez vos animaux régulièrement pour éviter qu’ils ne meurent de faim.
- Votre objectif est de **garder un maximum d’animaux en vie** aussi longtemps que possible !
- Si Vous n'avez plus d'animaux, alors vous avez perdu !

## 📄 Liste des Provisions : 

- **Bandage** : Soigne un animal en lui redonnant entre 20 et 100 points de vie
- **Bebe** : donne +25 de tout sauf de l'humeur
- **Burger** : enlève la faim complète mais à de petits effets secondaire
- **Chocolat** : redonne l'intégralité de l'humeur et redonne la moitié de la vie
- **Coca** : redonne de l'humeur mais après en avoir bu on peut plus s'arrêter, il fait perdre un peu de soif
- **Viande** : de la bonne viande qui donne soif mais rééquilibre le régime
- **Water** : L'eau c'est bon mais c'est pas cool
- **Watermelon** : redonne de la faim comme de la soif

## ⚙️ Installation avec WAMP

### 1. Pré-requis

```
- 🖥️ Windows
- 🧩 [WAMP Server](https://www.wampserver.com/) installé sur votre machine
```

### 2. Installation

1. **Cloner le projet** ou télécharger les fichiers ZIP  
```bash
   git clone https://github.com/votre-utilisateur/jeu-animaux-php.git  
```

2. Copier le dossier du jeu dans le répertoire suivant :  
```bash
   C:\wamp64\www\jeu-animaux  
```

3. Lancer **WAMP** et attendre que l’icône devienne **verte** dans la barre des tâches  

4. Ouvrir votre navigateur et accéder à :  
```bash
   http://localhost/jeu-animaux/
```

## 📁 Structure du projet

```
PHP-GAME/  
├── app 
│   ├── Animal
│   │        └── Animal.php
│   ├── Personne
│   │        ├── Brigand.php
│   │        ├── Chasseur.php
│   │        └── Voleur.php
│   ├── Provisions
│   │        ├── Bandage.php
│   │        ├── Bebe.php
│   │        ├── Burger.php
│   │        ├── Chocolat.php
│   │        ├── Coca.php
│   │        ├── Provision.php
│   │        ├── Viande.php
│   │        ├── Water.php
│   │        └── Watermelon.php
│   └── Partie.php
├── Interface.php
├── Main.php
├── README.md
└── style.css
```

## 🧑‍💻 Auteur

Développé en PHP par Nolhan Marteau
