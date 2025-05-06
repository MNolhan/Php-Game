<?php

namespace App\Provision;

class Chocolat extends Provision {
    
    public function __construct(){

        $this->icone = '🍫';
        $this->nom = 'Chocolat';
        
        $this->viepoint = 50;
        $this->humeurpoint = 100;
    }
}