<?php

namespace Sodas;


class Pomidoras extends Augalas
{
    public $foto;
    public $plius;

    public function __construct($lastId)
    {
        parent::__construct($lastId);
        $pomidoruSodas = ['./photo/pirma.jpg', './photo/antra.jpg', './photo/trecia.jpg'];
        shuffle($pomidoruSodas);
        $this->foto = $pomidoruSodas[0];
    }

    public function addAugalas()
    {
        $this->plius = rand(1, 3);
        $this->count =  $this->count + $this->plius;
    }
}
