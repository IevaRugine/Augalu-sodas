<?php

namespace Sodas;

class Agurkas extends Augalas
{
    public $foto;
    public $plius;


    public function __construct($lastId)
    {
        parent::__construct($lastId);
        $agurkuSodas = ['./photo/pirmas.jpg', './photo/antras.jpg', './photo/trecias.jpg'];
        shuffle($agurkuSodas);
        $this->foto = $agurkuSodas[0];
    }


    public function addAugalas()
    {
        $this->plius = rand(2, 9);
        $this->count =  $this->count + $this->plius;
    }
}
