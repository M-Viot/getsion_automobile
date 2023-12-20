<?php
require 'app.php';
try {
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE, DB_USER, DB_PASS);
    $req = $dbh->query('
        DROP TABLE IF EXISTS `car`
    ');
    $req = $dbh->query('
        CREATE TABLE IF NOT EXISTS `car` (
        `brand` varchar(50) NOT NULL,   
        `model` varchar(50) NOT NULL,
        `id_num` varchar(15) NOT NULL,
        `gas` varchar(10) NOT NULL,
        `price` float NOT NULL,
        `is_new` tinyint NOT NULL,
        `is_reserved` tinyint NOT NULL,
        PRIMARY KEY (`id_num`),
        UNIQUE KEY `id_num` (`id_num`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4
    ');
    $req = $dbh->query("
        INSERT INTO `car` (`brand`, `model`, `id_num`, `gas`, `price`, `is_new`, `is_reserved`) VALUES
        ('Volkswagen', 'Golf', 'HQ-961-PE', 'Gasole', 11258, 0, 0),
        ('Ford', 'Mondéo', 'CT-447-IJ', 'GPL', 18221, 0, 0),
        ('Citroën', 'Berlingo', 'PD-112-QV', 'Gasole', 14871, 1, 0),
        ('Citroën', 'C4', 'BG-644-WK', 'Essence', 13585, 0, 0),
        ('Peugeot', '2008', 'WV-917-OM', 'Électrique', 18833, 0, 1),
        ('Audi', 'A3', 'BW-252-RY', 'Essence', 16778, 0, 1),
        ('Volkswagen', 'Touran', 'SW-155-FP', 'Gasole', 19788, 1, 1),
        ('Audi', 'a5', 'CL-117-UI', 'Essence', 18967, 0, 0),
        ('Fiat', '500', 'KC-821-GJ', 'Électrique', 17631, 0, 0),
        ('Volkswagen', 'Polo', 'LW-772-XT', 'Essence', 15763, 1, 0),
        ('Renault', 'Espace', 'IK-733-AP', 'Gasole', 18926, 0, 0),
        ('Peugeot', '3008', 'QR-571-YC', 'Hybrid', 18898, 1, 0),
        ('Renault', 'Clio', 'EB-558-KY', 'Essence', 16776, 1, 1),
        ('Peugeot', 'Donec', 'PV-304-YX', 'Électrique', 11046, 1, 1),
        ('Audi', 'A8', 'GL-417-LL', 'Essence', 10000, 1, 1)
    ");
    echo 'Initialisation OK !';

} catch (PDOException $e) {
    die("Une erreur est survenue lors da la connexion ".$e->getMessage());
}
