<?php

namespace Sodas;

use Sodas\Augalas;

class Agurkas extends Augalas
{
    public $foto;
    public $plius;
    public $type;
    public $price;


    public function __construct($lastId)
    {
        parent::__construct($lastId);
        $agurkuSodas = ['./photo/pirmas.jpg', './photo/antras.jpg', './photo/trecias.jpg'];
        shuffle($agurkuSodas);
        $this->foto = $agurkuSodas[0];
        $this->type = 'Agurkas';
        $this->price = 7;
    }


    public function addAugalas()
    {
        $this->plius = rand(2, 9);
        $this->count =  $this->count + $this->plius;
    }
    // public function __get($propertyName)
    // {
    //     return $this->$propertyName;
    // }

    // public function __set($propertyName, $value)
    // {
    //     $this->$propertyName = $value;
    // }
}
