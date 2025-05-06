<?php

namespace App\Provision;

class Coca extends Provision {
    
    public function __construct(){

        $this->icone = '🥤';
        $this->nom = 'Coca';
        
        $this->humeurpoint = 30;
        $this->soifpoint = -10;
    }
}