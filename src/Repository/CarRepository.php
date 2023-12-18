<?php

namespace Mviot\GetsionAutomobile\Repository;

use Mviot\GetsionAutomobile\Models\Car;
use PDO;
use PDOException;

class CarRepository
{
    public function __construct()
    {

    }
    public function findAll(){
        $ret = [];
        try {
            $dbh = new PDO('mysql:host=localhost;dbname='.DB_DATABASE, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die("Une erreur est survenue".$e->getMessage());
        }
        $req = $dbh->query('SELECT * FROM car');
        $data = $req->fetchall(PDO::FETCH_ASSOC);
        foreach ($data as $item){
            $car = new Car(
                $item['brand'],
                $item['model'],
                $item['id_num'],
                $item['gas'],
                $item['price'],
                $item['is_new'],
                $item['is_reserved'],
            );
            $ret[]=$car;
        }
        return $ret;
    }
}
