<?php

namespace Sodas;

interface Store
{

    function getNewId();
    function addNew(Augalas $obj);
    function getAll();
    function remove($id);
    function grow();
    function pick($id, $kiek);
    function pickAll($id);
    function harvestAll();
}
