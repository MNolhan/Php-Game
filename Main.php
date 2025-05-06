<?php

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    // $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $className . '.php';
    $fileName = str_replace('App/', __DIR__ . '/app', $className . '.php');
    if (file_exists($fileName)) {
        require $fileName;
    } else {
        echo "Le fichier pour la classe {$className} {$fileName} est introuvable.<br>";
    }
});

session_start();

use App\Partie;
use App\Animal\Animal;

$partie = $_SESSION['partie'] ?? Partie::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['step'])) {

    switch($_POST['step']){

        case 'createAnimal' :
            $animal = new Animal($_POST['icone'], $_POST['nom']);
            $partie->addAnimal($animal);
            break;
        case 'reset' :
            $partie = null;
            break;
        case 'dormir' :
            $partie->nuit();
            break;
        case 'Chercher':
            $partie->ChercheProvision();
            break;
        case 'Carresser':
            $ida = $_POST['animal'];
            $partie->carresserAnimal($ida);
            break; 
        case 'feedAnimal':
            $ida = $_POST['animal'];
            $idp = $_POST['provision'];
            $partie->feedAnimal($ida, $idp);
            break;
        
    }

    $_SESSION['partie'] = $partie;
    header('Location: Main.php');
    exit;

} else {
    require 'Interface.php';
    $partie->clearMessages();
}

$_SESSION['partie'] = $partie;
