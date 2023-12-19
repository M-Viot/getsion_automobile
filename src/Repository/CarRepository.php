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
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $req = $dbh->query('SELECT * FROM car');
            $data = $req->fetchall(PDO::FETCH_ASSOC);
            foreach ($data as $item){
                $ret[]=$this->dataToModel($item);
            }
        } catch (PDOException $e) {
            die("Une erreur est survenue".$e->getMessage());
        }
        return $ret;
    }
    public function findAllJson(): array
    {
        $ret = [
            'success'=>true,
            'message'=>'Liste Voitures',
            'data'=>[]
        ];
        try {
            $test = [];
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $req = $dbh->query('SELECT * FROM car');
            $data = $req->fetchall(PDO::FETCH_ASSOC);
            foreach ($data as $item){
                $test[]=$item;
            }
            $ret['data']= $test;
        } catch (PDOException $e) {
            $ret['success']=false;
            $ret['message']="Une erreur est survenue".$e->getMessage();
        }
        return $ret;
    }
    public function find($idNum): array
    {
        $ret = [
            'success'=>true,
            'message'=>'Voiture trouvée',
            'data'=>null
        ];
        try {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $req = $dbh->query('SELECT * FROM car WHERE id_num = '."'$idNum'");
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $ret['data'] =  $data;
        } catch (PDOException $e) {
            $ret['success']=false;
            $ret['message']="Une erreur est survenue".$e->getMessage();
        }
        return $ret;
    }
    public function new($data):array{
        extract($data);
        $ret = [
            'success'=>true,
            'message'=>'Enregistré avec succès'
        ];
        try {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $stmt = $dbh->prepare("INSERT INTO car (brand, model, id_num, gas, price, is_new, is_reserved) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $brand);
            $stmt->bindParam(2, $model);
            $stmt->bindParam(3, $idNum);
            $stmt->bindParam(4, $gas);
            $stmt->bindParam(5, $price);
            $stmt->bindParam(6, $isNew);
            $stmt->bindParam(7, $isReserved);
            $stmt->execute();
        } catch (PDOException $e) {
            $ret = [
                'success'=>false,
                'message'=>$e->getMessage()
            ];
        }
        return $ret;
    }
    public function update($data):array{
        extract($data);
        $ret = [
            'success'=>true,
            'message'=>'Modifié avec succès'
        ];
        try {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $stmt = $dbh->prepare("UPDATE car
             set brand = ?, model = ?, is_reserved = ?, gas = ?, price = ?, is_new = ? WHERE  id_num = ?");
            $stmt->bindParam(1, $brand);
            $stmt->bindParam(2, $model);
            $stmt->bindParam(3, $isReserved);
            $stmt->bindParam(4, $gas);
            $stmt->bindParam(5, $price);
            $stmt->bindParam(6, $isNew);
            $stmt->bindParam(7, $idNum);
            $stmt->execute();
        } catch (PDOException $e) {
            $ret = [
                'success'=>false,
                'message'=>$e->getMessage()
            ];
        }
        return $ret;
    }
    public function delete($idNum):array{
        $ret = [
            'success'=>true,
            'message'=>'Supprimé avec succès'
        ];
        try {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
            $stmt = $dbh->prepare("DELETE FROM car WHERE id_num = ?");
            $stmt->bindParam(1, $idNum);
            $stmt->execute();
        } catch (PDOException $e) {
            $ret = [
                'success'=>false,
                'message'=>$e->getMessage()
            ];
        }
        return $ret;
    }
    private function dataToModel($item):Car
    {
        return new Car(
            $item['brand'],
            $item['model'],
            $item['id_num'],
            $item['gas'],
            $item['price'],
            $item['is_new'],
            $item['is_reserved'],
        );
    }

}
