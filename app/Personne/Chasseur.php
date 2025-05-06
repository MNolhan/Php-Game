<?php

namespace App\Personne;

use App\Partie;

class Chasseur extends Brigand {

    public function __construct() {
        $this->nom = 'Chasseur Russe';
        $this->icone = '🔫';
    }

    public function attaquer() {
        $partie = Partie::GetInstance();

        if (rand(0, 1) === 0) {
            $partie->addMessage("{$this->icone} Le Chasseur Russe voulait tirer… mais son chargeur était vide !");
            return;
        }

        $listeAnimaux = $partie->getAnimals();

        if (count($listeAnimaux) > 0) {

            $index = array_rand($listeAnimaux);
            $nomVictime = $listeAnimaux[$index]->getName();

            unset($listeAnimaux[$index]);

            $listeAnimaux = array_values($listeAnimaux);

            $partie->setAnimals($listeAnimaux);

            $partie->addMessage("🔫 Le Chasseur Russe a abattu {$nomVictime} !");
        } else {
            $partie->addMessage("{$this->icone} Le Chasseur Russe est venu… mais il n'y avait aucun animal à viser.");
        }
    }
}
