<?php

namespace Sodas;

interface Store
{

    //function getData();
    //function setData(($data);
    function getNewId();
    //function save($augalas, $key);
    function addNew(Augalas $obj);
    function getAll();
    function remove($id);
    function grow();
    function pick($id, $kiek);
    function pickAll($id);
    function harvestAll();
}
