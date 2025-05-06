<?php

namespace App\Provision;

class Watermelon extends Provision {
    
    public function __construct(){

        $this->icone = '🍉';
        $this->nom = 'WaterMelon';
        
        $this->faimpoint = -20;
        $this->soifpoint = -30;
    }
}