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
    public function apiNew(): void
    {
        $repo = new CarRepository();
        $ret = json_encode($repo->new($_POST));
        echo $ret;
    }
    public function apiUpdate(): void
    {
        $repo = new CarRepository();
        $ret = json_encode($repo->update($_POST));
        echo $ret;
    }
    public function apiDelete(): void
    {
        $repo = new CarRepository();
        $ret = json_encode($repo->delete($_POST['idNum']));
        echo $ret;
    }

}
