<?php

namespace Sodas;

use Sodas\Augalas;

class Pomidoras extends Augalas
{
    public $photo;
    public $plius;
    public $type;
    public $price;

    public function __construct($lastId)
    {
        parent::__construct($lastId);
        $pomidoruSodas = ['./photo/pirma.jpg', './photo/antra.jpg', './photo/trecia.jpg'];
        shuffle($pomidoruSodas);
        $this->photo = $pomidoruSodas[0];
        $this->type = 'Pomidoras';
        $this->price = 8;
    }

    public function addAugalas()
    {
        $this->plius = rand(1, 3);
        $this->count =  $this->count + $this->plius;
    }
}
