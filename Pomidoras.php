<?php

class Pomidoras
{

    private $id, $count, $plius;
    public $foto;


    public function __construct($lastId, $pomidoruFoto)
    {

        $this->id = $lastId + 1;
        $this->count = 0;
        shuffle($pomidoruFoto);
        $this->foto = $pomidoruFoto[0];


        //$agurkoObj->id = $_SESSION['agurku ID'] + 1;
        //$agurkoObj->count = 0;
        //$agurkoObj->foto = $agurkuSodas[0];
    }



    public function addAugalas()
    {
        $this->plius = rand(1, 3);
        $this->count =  $this->count + $this->plius;
    }

    public function skintiAugalas($kiek)
    {
        $this->count = $this->count - $kiek;
    }

    public function nuskintiVisus()
    {
        $this->count = 0;
    }


    public function __get($propertyName)
    {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value)
    {
        $this->$propertyName = $value;
    }

    //Visai nebutina
    //public function __serialize()  // <----- ivyksta kai objektas realizuojamas
    //{
    //}

    public static function nuimtiDerliu($visiAgurkai)     // <---------$visiAgurkai = $_SESSION['obj']
    {
        foreach ($visiAgurkai as $index => $agurkas) {  //<--- sereializuotas stringas
            $agurkas = unserialize($agurkas);  //<-------agurko objektas
            $agurkas->nuskintiVisus(); //<---pridedam agurka
            $agurkas = serialize($agurkas);   //<---------vel stringas
            $visiAgurkai[$index] = $agurkas; // <--------ishsaugom agurkus

        }
    }
}
