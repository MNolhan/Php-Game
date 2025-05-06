<?php

namespace App\Provision;

class Bandage extends Provision {
    
    public function __construct(){

        $this->icone = '🩹';
        $this->nom = 'Bandage';
        
        $this->viepoint = rand(20, 100);
    }
}