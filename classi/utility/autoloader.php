<?php
 
function my_autoloader($className) {
    $firstLetter = $className[0];
    switch ($firstLetter) {
        case 'E':
            include_once(__DIR__ . '/../entity/' . $className . '.php' );
            break;
        case 'F':
            include_once(__DIR__ . "/../Foundation/" . $className . '.php' );
            break;
        case 'U':
            include_once(__DIR__ . "/../Utility/" . $className . '.php' );   
<<<<<<< HEAD
            break;
        case 'C':
            include_once(__DIR__ . "/../control/" . $className . '.php' );
            break;
=======
        case 'C':
            include_once(__DIR__ . '/../control/' . $className . '.php' );
            break;
        
>>>>>>> c8e7363a557a6bdd2a282a6f538457a5499d53a3
        
    }
}

spl_autoload_register('my_autoloader');