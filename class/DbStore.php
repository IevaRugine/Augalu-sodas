<?php

namespace Sodas;

use PDO;

class DbStore implements Store
{


    private $pdo;
    private $masyvas;



    public function __construct($o = null)
    {

        $host = '127.0.0.1';
        $db   = 'augalu_baze';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    //SKAITYMAS
    public function getAll()
    {
        $sql = "SELECT * FROM augalas
        ;";
        $stmt = $this->pdo->query($sql); // <--- SAUGU


        $masyvas = [];
        while ($row = $stmt->fetch()) {
            if ('Agurkas' == $row['type']) {
                $obj = new Agurkas(null);
            } else {
                $obj = new Pomidoras(null);
            }
            $obj->id = $row['id'];
            $obj->count = $row['count'];
            $obj->type = $row['type'];
            $masyvas[] = $obj;
        }
        return $masyvas;
    }
    public function getNewId()
    {
        return null;
    }

    public function addNew(Augalas $obj)
    {

        //RASYMAS
        $sql = "INSERT INTO augalas (`count`,`type`)
        VALUES ('.$obj->count.', '$obj->type');";
        $this->pdo->query($sql);  // <--- NESAUGU!!!!!!!!!
    }

    public function remove($id)
    {

        $sql = "DELETE FROM augalas
        WHERE id='" . $id . "';";
        $this->pdo->query($sql);  // <--- NESAUGU!!!!!!!!!

    }

    function grow()
    {
        foreach ($this->masyvas['obj'] as $row => $obj) {
            $obj->addAugalas();
            //$this->masyvas['obj'][$row] = $obj;
            $obj->count = $row['count'];

            $sql = "UPDATE augalas
            SET '.$obj->count.'
            WHERE 'count';";
            $this->pdo->query($sql);
        }
    }
}
