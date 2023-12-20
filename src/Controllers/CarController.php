<?php

namespace Mviot\GetsionAutomobile\Controllers;

use Mviot\GetsionAutomobile\Controller;
use Mviot\GetsionAutomobile\Models\Car;
use Mviot\GetsionAutomobile\Repository\CarRepository;

class CarController extends Controller
{
    /**
     * Affiche la liste des voitures du parc
     * @return void
     */
    public function index(): void
    {
        $repo = new CarRepository();
        $cars = $repo->findAll();
        $this->render('car/index',[
            'cars'=>$cars,
            'appTitle'=>'Liste des voitures'
        ]);
    }

    /**
     * Retourne une Reponse JSON en fonction des paramètres fournis
     * @return void
     */
    public function api(): void
    {
        $ret = [];
        $repo = new CarRepository();
        $context = $_POST['context'] ?? 'list';
        switch ($context){
            case 'list' :
                $ret = $repo->findAllJson();
                break;
            case 'new' :
                $ret = $repo->new($_POST);
                break;
            case 'update' :
                $ret = $repo->update($_POST);
                break;
            case 'delete' :
                $ret = $repo->delete($_POST['idNum']);
                break;
            case 'get' :
                $ret = $repo->find($_POST['idNum']);
                break;
            default:
                $ret = [
                    'success' => false,
                    'message' => 'Contexte inconnu'
                ];
        }
        echo json_encode($ret);
    }

}
