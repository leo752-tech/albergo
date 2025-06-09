<?php

//require('C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty\libs\Smarty.class.php');
require(__DIR__ . '/../../smarty/libs/Smarty.class.php');

class StartSmarty{
    public static function configuration(){
        //$path1 = 'C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty';

        $path = __DIR__ . '/../../smarty';
        $smarty = new Smarty();
        $smarty->setTemplateDir($path . '/templates');   
        
        // directory dove Smarty trans-compila il codice dei template in codice php
        $smarty->setCompileDir( $path . '/templates_c');  
        
        // altre dir non strettamente necessarie per un uso basico di Smarty
        $smarty->setCacheDir( $path . '/cache');
        $smarty->setConfigDir( $path . '/configs');	
        
        return $smarty;
    }
}