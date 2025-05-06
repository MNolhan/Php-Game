<?php

namespace App\Provision;

abstract class Provision{
    
    protected $icone = '';
    protected $nom = '';

    protected $viepoint = 0 ;
    protected $humeurpoint = 0;
    protected $faimpoint = 0;
    protected $soifpoint = 0;

    //! Getter 
    public function getviepoint()
    {
        return $this->viepoint;
    }

    public function gethumeurpoint()
    {
        return $this->humeurpoint;
    }

    public function getfaimpoint()
    {
        return $this->faimpoint;
    }

    public function getsoifpoint()
    {
        return $this->soifpoint;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getIcone()
    {
        return $this->icone;
    }

}