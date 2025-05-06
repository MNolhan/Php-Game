<?php

namespace App\Provision;

class Viande extends Provision {
    
    public function __construct(){

        $this->icone = '🍖';
        $this->nom = 'Viande';
        
        $this->viepoint = 15;
        $this->soifpoint = 10;
        $this->faimpoint = -35;
    }
}