<?php

namespace Sodas;

use PDO;

class DbStore implements Store
{

    private $pdo;

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
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        //$stmt = $this->pdo->query($sql); // <--- SAUGU


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
            $obj->photo = $row['photo'];
            $obj->plius = $row['plius'];
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

        $sql = "INSERT INTO augalas (`count`,`type`, `photo`)
        VALUES (?, ?, ? );";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$obj->count, $obj->type, $obj->photo]);

        // $sql = "INSERT INTO augalas (`count`,`type`)
        // VALUES ('.$obj->count.', '$obj->type');";
        // $this->pdo->query($sql);  // <--- NESAUGU!!!!!!!!!

    }

    public function remove($id)
    {

        $sql = "DELETE FROM augalas
        WHERE id = ? ; ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);


        // $sql = "DELETE FROM augalas
        // WHERE id='" . $id . "';";
        // $this->pdo->query($sql);  // <--- NESAUGU!!!!!!!!!

    }

    function grow()
    {
        foreach ($this->getAll() as $k => $obj) {
            $obj->addAugalas();


            $sql = "UPDATE augalas
            SET count = $obj->count, 
            plius = $obj->plius
            WHERE id = $obj->id ; ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();


            // $sql = "UPDATE augalas
            // SET `count` = '$obj->count'
            // WHERE `id`='$obj->id';";
            // $this->pdo->query($sql);
        }
    }

    public function pick($id, $kiek)
    {
        foreach ($this->getAll() as $k => $obj) {
            if ($obj->id == $id) {
                $obj->skintiAugalas($kiek);


                $sql = "UPDATE augalas
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$obj->count, $id]);



                // $sql = "UPDATE augalas
                // SET `count` = '$obj->count'
                // WHERE `id`='$obj->id';";
                // $this->pdo->query($sql);
            }
        }
    }

    public function pickAll($id)
    {
        foreach ($this->getAll() as $k => $obj) {
            if ($obj->id == $id) {
                $obj->nuskintiVisus();

                $sql = "UPDATE augalas
                SET count = ?
                WHERE id = ? ; ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$obj->count, $id]);

                // $sql = "UPDATE augalas
                // SET `count` = '$obj->count'
                // WHERE `id`='$obj->id';";
                // $this->pdo->query($sql);
            }
        }
    }

    public function harvestAll()
    {
        foreach ($this->getAll() as $k => $obj) {
            $obj->nuskintiVisus();

            $sql = "UPDATE augalas
            SET `count` = '$obj->count'
            WHERE `id`='$obj->id';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();


            //$this->pdo->query($sql);
        }
    }
}
