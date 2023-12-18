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
        $this->render('cars/index',[
            'cars'=>$cars,
            'appTitle'=>'Liste des voitures'
        ]);
    }
}
