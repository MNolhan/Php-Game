<?php 

namespace App\Animal;

use App\Partie;
use App\Provision\Provision;

class Animal 
{

    //! les Stats
    private $vie = 100;
    private $faim = 50;
    private $soif = 50;
    private $humeur = 100;

    private $nom;
    private $icone;
    private $age = 0;

    public function __construct($icone, $nom){
        $this->nom = $nom;
        $this->icone = $icone;
    }

    public function IsDead(){
        return $this->vie == 0;
    }

    //! Getter
    public function getName() {
        return $this->nom;
    }
    public function getIcone() {
        return $this->icone;
    }
    public function getAge() {
        return $this->age;
    }
    public function getVie() {
        return $this->vie;
    }
    public function getFaim() {
        return $this->faim;
    }
    public function getSoif() {
        return $this->soif;
    }
    public function getHumeur() {
        return $this->humeur;
    }
    
    //! ""Setter""
    public function ChangeVie($points) {

        /*
        $this->vie += $points;
        if($this->vie < 0){
            return $this->vie = 0;
        } elseif  {
            ($this->vie > 100){
                return $this->vie = 100;
            }
        }
        return $this->vie;

        ou 
        
        */

        $partie = Partie::GetInstance();
        $partie->addMessage("{$this->nom} : {$points} de Vie");
        $this->vie = max(0, min(100, $this->vie + $points));
    }

    public function ChangeFaim($points) {
        $partie = Partie::GetInstance();
        $partie->addMessage("{$this->nom} : {$points} de Faim");
        $this->faim = max(0, min(100, $this->faim + $points));
    }

    public function ChangeSoif($points) {
        $partie = Partie::GetInstance();
        $partie->addMessage("{$this->nom} : {$points} de Soif");
        $this->soif = max(0, min(100, $this->soif + $points));
    }

    public function ChangeHumeur($points) {
        $partie = Partie::GetInstance();
        $partie->addMessage("{$this->nom} : {$points} d'Humeur");
        $this->humeur = max(0, min(100, $this->humeur + $points));
    }

    //! Méthode
    public function Dormir(){
        
        $partie = Partie::GetInstance();
        $partie->addMessage("{$this->nom} s'endort");

        if(!$this->IsDead()){
            $this->age++;
            $this->ChangeFaim(rand(5, 15));
            $this->ChangeSoif(rand(5, 15));
            $this->ChangeHumeur(rand(-80, 80));

            if($this->faim >= 100){
                $this->ChangeVie(rand(-30, -10));
            }
            if($this->soif >= 100){
                $this->ChangeVie(rand(-30, -10));
            }
            if($this->humeur <= 0){
                $this->ChangeVie(rand(-20, 0));
            }
        }
    }

    public function Consommer(Provision $provision){
        $this->ChangeVie($provision->getviepoint());
        $this->ChangeFaim($provision->getfaimpoint());
        $this->ChangeSoif($provision->getsoifpoint());
        $this->ChangeHumeur($provision->gethumeurpoint());
    }

    public function Carresser() {
        $points = rand(0, 30);
        $this->ChangeVie($points);
    }

    public function Soigner() {
        $points = rand(20, 100);
        $this->ChangeVie($points);
    }
}


