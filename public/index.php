<?php

$path = 'C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty';

require('C:\Users\momok\Documents\Programmazione_web\slide\20_Smarty\20_Smarty\20_smarty-esercitazione\View\smarty\libs\Smarty.class.php');

function run(){
    global $path;
    $smarty = new Smarty();
    $smarty->template_dir= $path . '/templates/';
    $smarty->compile_dir= $path . '/templates_c/';
    $smarty->config_dir= $path  . '/configs/';
    $smarty->cache_dir= $path .  '/cache/';

    $smarty->display('home.tpl');
}

$result = run();