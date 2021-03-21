<?php

namespace app\entity;


class Avoir {


    private $id_ustensile;
    private $ustensile;


    function __construct($id_ustensile, $ustensile)
    {
        $this->id_ustensile = $id_ustensile;
        $this->ustensile = $ustensile;
    }


    





    /**
     * Get the value of id_ustensile
     */ 
    public function getId_ustensile()
    {
        return $this->id_ustensile;
    }

    /**
     * Set the value of id_ustensile
     *
     * @return  self
     */ 
    public function setId_ustensile($id_ustensile)
    {
        $this->id_ustensile = $id_ustensile;

        return $this;
    }

    /**
     * Get the value of ustensile
     */ 
    public function getUstensile()
    {
        return $this->ustensile;
    }

    /**
     * Set the value of ustensile
     *
     * @return  self
     */ 
    public function setUstensile($ustensile)
    {
        $this->ustensile = $ustensile;

        return $this;
    }
}