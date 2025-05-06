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

## ⚙️ Installation avec WAMP

### 1. Pré-requis

```
- 🖥️ Windows
- 🧩 [WAMP Server](https://www.wampserver.com/) installé sur votre machine
```

### 2. Installation

```bash
1. **Cloner le projet** ou télécharger les fichiers ZIP  
   git clone https://github.com/votre-utilisateur/jeu-animaux-php.git  
2. Copier le dossier du jeu dans le répertoire suivant :  
   C:\wamp64\www\jeu-animaux  
3. Lancer **WAMP** et attendre que l’icône devienne **verte** dans la barre des tâches  
4. Ouvrir votre navigateur et accéder à :  
   http://localhost/jeu-animaux/
```

## 📁 Structure du projet

```
jeu-animaux/  
├── index.php  
├── actions/  
│   └── nourrir.php  
├── includes/  
│   ├── header.php  
│   └── functions.php  
├── assets/  
│   └── style.css  
├── database.sql  
└── README.md  
```

## 🧑‍💻 Auteur

Développé en PHP par Nolhan Marteau
