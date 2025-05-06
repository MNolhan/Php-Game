<?php

namespace App\Provision;

class Water extends Provision {
    
    public function __construct(){

        $this->icone = '🍾';
        $this->nom = 'Water';
        
        $this->humeurpoint = -20;
        $this->soifpoint = -40;
    }
}