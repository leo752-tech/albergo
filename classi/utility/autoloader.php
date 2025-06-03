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
        // ... altri casi ...
        
    }
}

spl_autoload_register('my_autoloader');