<?php

namespace Mviot\GetsionAutomobile\Controllers;

use Mviot\GetsionAutomobile\Controller;
use Mviot\GetsionAutomobile\Models\Car;

class CarController extends Controller
{
    /**
     * Affiche la liste des voitures du parc
     * @return void
     */
    public function index(): void
    {
        $cars = [
            new Car('Renault', 'Mégane','326-IF-79', 'SP95', 1000.00, false, false),
            new Car('Peugeot', '2008','352-IF-79', 'SP98', 3000.00, true, false),
            new Car('Renault', 'Mégane','326-IF-79', 'GO', 1200.00, false, true),
            new Car('Renault', 'Mégane','326-IF-79', 'SP95', 900.00, false, false),
            new Car('Renault', 'Mégane','326-IF-79', 'SP95', 1000.00, false, false)
        ];
        $this->render('cars/index',[
            'cars'=>$cars,
            'appTitle'=>'Liste des voitures'
        ]);
    }
}
