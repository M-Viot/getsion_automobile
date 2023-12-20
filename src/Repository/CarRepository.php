<?php

namespace Mviot\GetsionAutomobile\Repository;

use Mviot\GetsionAutomobile\Models\Car;
use PDO;
use PDOException;

class CarRepository
{
    /**retourne la liste de tous les véhicules
     * @return array|void
     */
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
            die("Une erreur est survenue lors da la connexion ".$e->getMessage());
        }
        return $ret;
    }
    // For Json return ----------------------------------------------------------------------------------

    /**
     * Retourne la liste de tout les véhicules dans un tableau
     * avec informations nécessaires au front
     * @return array
     */
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
            $ret['message']="Une erreur est survenue :".$e->getMessage();
        }
        return $ret;
    }

    /**
     * Retourne les informations du véhicule demandé
     * avec informations nécessaires au front
     * @param $idNum
     * @return array
     */
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
            $ret['message']="Une erreur est survenue :".$e->getMessage();
        }
        return $ret;
    }

    /**
     * Création d'un nouveau véhicule
     * retourne informations nécessaires au front
     * @param $data
     * @return array
     */
    public function new($data):array{
        extract($data);
        $ret = [
            'success'=>true,
            'message'=>'Enregistré avec succès'
        ];

        if($this->validParams($data)) {
            extract($data);
            try {
                $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
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
                    'success' => false,
                    'message' => "Une erreur est survenue :" . $e->getMessage()
                ];
            }
        }
        else{
            $ret = [
                'success'=>false,
                'message'=>'Paramètre(s) manquant(s)'
            ];
        }
        return $ret;
    }
    /**
     * Modification d'un nouveau véhicule
     * retourne informations nécessaires au front
     * @param $data
     * @return array
     */
    public function update($data):array{
        $ret = [
            'success'=>true,
            'message'=>'Modifié avec succès'
        ];
        if($this->validParams($data)){
            extract($data);
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
        }else{
            $ret = [
                'success'=>false,
                'message'=>'Paramètre(s) manquant(s)'
            ];
        }
        return $ret;
    }

    /**
     * Suppression d'un nouveau véhicule
     * retourne informations nécessaires au front
     * @param $idNum
     * @return array
     */
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

    /**
     * Retourne d'une classe Car avec tableau fourni
     * @param array $item
     * @return Car
     */
    private function dataToModel(array $item):Car
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

    /**
     * Vérification de la présence des informations nécessaire
     * @param $data
     * @return bool
     */
    private function validParams($data):bool
    {
        extract($data);
        return $brand && $model && $idNum && $gas && $price;
    }

}
