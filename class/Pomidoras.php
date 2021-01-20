<?php

namespace Sodas;

use Sodas\Augalas;

class Pomidoras extends Augalas
{
    public $foto;
    public $plius;
    public $name;
    public $price;

    public function __construct($lastId)
    {
        parent::__construct($lastId);
        $pomidoruSodas = ['./photo/pirma.jpg', './photo/antra.jpg', './photo/trecia.jpg'];
        shuffle($pomidoruSodas);
        $this->foto = $pomidoruSodas[0];
        $this->name = 'Pomidoras';
        $this->price = 8;
    }

    public function addAugalas()
    {
        $this->plius = rand(1, 3);
        $this->count =  $this->count + $this->plius;
    }
}
