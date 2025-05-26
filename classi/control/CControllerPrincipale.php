<?php

class CControllerPrincipale{
    
    //punto di accesso principale dell'applicazione
    //fa il parsing della URL per capire quali metodi controller chiamare e con quali parametri
    public function run($richiestaUrl){
        
        

        $richiestaUrl = trim($richiestaUrl, '/');
        $partiUrl = explode('/', $richiestaUrl);

        array_shift($partiUrl);
        array_shift($partiUrl);
        array_shift($partiUrl);
        array_shift($partiUrl);
       
        //estrazione classe di controllo
        if(!empty($partiUrl[0])){$controller = ucfirst($partiUrl[0]);}
        else{$controller = "Utente";}
        
        //estrazione metodo di controllo
        if(!empty($partiUrl[1])){$metodo = $partiUrl[1];}
        else{$metodo = "login";}

        $controller = 'C' . $controller;
        $controllerFile = __DIR__ . "/{$controller}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Check if the method exists in the controller
            if (method_exists($controller, $metodo)) {
                $parametri = array_slice($partiUrl, 2); 
                call_user_func_array([$controller, $metodo], $parametri);
            } else {
                // show 404 page
                echo "metodo non esiste";
                header("PERCORSO DA DEFINIRE");
            }
        } else {
            // show 404 page
            echo "classe non esiste";
            header("PERCORSO DA DEFINIRE");
        }
    }
}
