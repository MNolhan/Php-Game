<?php

namespace App;

use App\Animal\Animal;
use App\Provision\Provision;

class Partie {

    private $points = 3;
    private $jour = 1;
    private $animals = [];
    private $provision = [];
    private static $instance = null;
    private $message = [];
    private $indexAnimal = 0;

    private function __construct () {}

    public function __wakeup(){
        self::$instance = $this;
    }

    public static function GetInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function nuit(){
        $this->jour++;
        $this->points = 3;
        $this->addMessage("Le jour {$this->jour} est arrivé ! Vous avez {$this->points} points !");

        foreach($this->animals as $animals){
            $animals->Dormir();
        }

        $this->animals = array_filter($this->animals, function($animal) {
            if ($animal->IsDead()) {
                $this->addMessage("💀 {$animal->getName()} est mort...");
                return false;
            }
            return true;
        });

        if ($this->jour > 9) { #  Pour mettre un niveau de difficulté j'ajoute le Chasseur que à partir d'un certain nombre de jour
            if (rand(1, 100) <= 15) { 
                (new \App\Personne\Chasseur())->attaquer();
            }
        }
        
        if ($this->jour > 19) { # Pareil pour le Voleur
            if (rand(1, 100) <= 15) {
                (new \App\Personne\Voleur())->voler();
            }
        }
        
        if (count($this->animals) == 0){
            
            $this->addMessage("---------| Game Over |---------");

            $this->addMessage("Tout vos Animaux sont Morts, vous avez perdu !");
            if ($this->indexAnimal > 1){
                if ($this->jour <= 10){
                    $this->addMessage("Ton score est de ". $this->jour ." jours, avec " . $this->indexAnimal . " animaux créés. Ce qui est sur, je ne te donnerais pas mes Animaux avant de partir en vacances");
                } elseif ($this->jour > 10 && $this->jour <= 20) {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animaux créés. Pas mal dutout");
                } elseif ($this->jour > 20 && $this->jour <= 50) {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animaux créés. J'ai face à moi, un expert !!");
                } else {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animaux créés. Juste Wow");
                }
            } else {
                if ($this->jour <= 10){
                    $this->addMessage("Ton score est de ". $this->jour ." jours, avec " . $this->indexAnimal . " animal créé. Ce qui est sur, je ne te donnerais pas mes Animaux avant de partir en vacances");
                } elseif ($this->jour > 10 && $this->jour <= 20) {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animal créé. Pas mal dutout");
                } elseif ($this->jour > 20 && $this->jour <= 50) {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animal créé. J'ai face à moi, un expert !!");
                } else {
                    $this->addMessage("Ton score est de " . $this->jour . " jours, avec " . $this->indexAnimal . " animal créé. Juste Wow");
                }
            }
            $this->jour = 1;
            $this->provision = [];
            $this->points = 3;
        }
    }

    //! -----------------------------------------------------

    public function addAnimal(Animal $animal)
    {
        if($this->consumePoints(3)){
            $this->addMessage("Bienvenue {$animal->getName()} !");
            $this->animals[] = $animal;
        }
        $this->indexAnimal += 1;
    }

    public function getAnimals()
    {
        return $this->animals;
    }

    public function setAnimals(array $animaux) {
        $this->animals = $animaux;
    }    

    //! -----------------------------------------------------

    private function consumePoints($points){
        if ($this->points >= $points){
            $this->points -= $points;
            return true;
        }

        $this->addMessage("Vous n'avez pas assez de points pour cette action");
        return false;
    }

    //! -----------------------------------------------------

    public function ChercheProvision(){
        if ($this->jour == 1){
            $this->addMessage("Vous devez créer un animal avant toute chose !");
            return;
        }

        if ($this->consumePoints(1)) {
           
            $provisionClasses = [
                \App\Provision\Watermelon::class,
                \App\Provision\Coca::class,
                \App\Provision\Water::class,
                \App\Provision\Burger::class,
                \App\Provision\Bebe::class,
                \App\Provision\Chocolat::class,
                \App\Provision\Viande::class,
                \App\Provision\Bandage::class,
            ];
    
            $randomClass = $provisionClasses[array_rand($provisionClasses)];
            $provision = new $randomClass();
    
            $this->addProvision($provision);
            $this->addMessage("Vous avez trouvé une provision : " . $provision->GetNom());
        }
    }

    public function addProvision($provisions){
        $this->provision[] = $provisions;
    }

    public function GetProvision(){
        return $this->provision;
    }

    public function setProvision(array $provisions) {
        $this->provision = $provisions;
    }    
    
    public function feedAnimal($ida, $idp){
        if ($idp == null) {
            $this->addMessage("Vous n'avez plus de provisions ! Cherchez-en !");
            return;
        }
        $animal = $this->animals[$ida];
        $provision = $this->provision[$idp];
        $animal->Consommer($provision);
        unset($this->provision[$idp]);
    }
    
    

    //! -----------------------------------------------------

    public function getMessages(){
        return $this->message;
    }

    public function clearMessages(){
        $this->message = [];
    }

    public function addMessage($message){
        $this->message[] = $message;
    }

    //! -----------------------------------------------------

    public function getPoints(){
        return $this->points;
    }

    public function getJour(){
        return $this->jour;
    }

    //! -----------------------------------------------------

    public function carresserAnimal($ida) {
        if (!$this->consumePoints(1)) return;
    
        $this->animals[$ida]->Carresser();
    }

}