<?php

namespace App\Provision;

class Bebe extends Provision {
    
    public function __construct(){

        $this->icone = '👶';
        $this->nom = 'Bébé';
        
        $this->viepoint = 25;
        $this->soifpoint = -25;
        $this->faimpoint = -25;
    }
}