<?php

namespace App\Provision;

class Burger extends Provision {
    
    public function __construct(){

        $this->icone = '🍔';
        $this->nom = 'Burger';
        
        $this->viepoint = -10;
        $this->faimpoint = -100;
        $this->soifpoint = 30;
    }
}