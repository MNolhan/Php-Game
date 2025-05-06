<?php

namespace App\Personne;

use App\Partie;

class Voleur extends Brigand {

    public function __construct() {
        $this->nom = 'Voleur';
        $this->icone = '🦹‍♂️';
    }

    public function voler() {
        $partie = Partie::GetInstance();
        $listeProvisions = $partie->getProvision();

        $quantiteVol = min(3, count($listeProvisions));

        if (rand(0, 3) <= 2) {
            $partie->addMessage("{$this->icone} Le Voleur n'a pas réussi à volé les provisions !");
            return;
        }

        if ($quantiteVol > 0) {
            for ($i = 0; $i < $quantiteVol; $i++) {
                $index = array_rand($listeProvisions);
                unset($listeProvisions[$index]);
            }

            $listeProvisions = array_values($listeProvisions);

            $partie->setProvision($listeProvisions);

            $partie->addMessage("{$this->icone} Le voleur a volé 3 provisions !");
        } else {
            $partie->addMessage("{$this->icone} Le voleur est venu mais il n'y avait rien à voler !");
        }
    }
}
