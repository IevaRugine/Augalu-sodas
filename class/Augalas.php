<?php

namespace Sodas;

class Augalas
{

    private $id, $count;


    public function __construct($lastId)
    {

        $this->id = $lastId + 1;
        $this->count = 0;
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

    // public static function nuimtiDerliu($visiAgurkai)     // <---------$visiAgurkai = $_SESSION['obj']
    // {
    //     foreach ($visiAgurkai as $index => $agurkas) {  //<--- sereializuotas stringas
    //         $agurkas = unserialize($agurkas);  //<-------agurko objektas
    //         $agurkas->nuskintiVisus(); //<---pridedam agurka
    //         $agurkas = serialize($agurkas);   //<---------vel stringas
    //         $visiAgurkai[$index] = $agurkas; // <--------ishsaugom agurkus

    //     }
        // }
        // public static function koksSiandienOras(){
        //     echo "geras";
        // }
        // public static function divide($a,$b){
        //     return $a/$b;
    }
}



// foreach ($visiAgurkai as $index => $agurkas) {  //<--- sereializuotas stringas
//     $agurkas = unserialize($agurkas);  //<-------agurko objektas
//     $agurkas->nuskintiVisus(); //<---pridedam agurka
//     $agurkas = serialize($agurkas);   //<---------vel stringas
//     $visiAgurkai[$index] = $agurkas; // <--------ishsaugom agurkus