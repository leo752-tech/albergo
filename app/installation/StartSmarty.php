<?php

include_once(__DIR__ . '/../../smarty/smarty/libs/Smarty.class.php');

class StartSmarty{
    public static function configuration(){
        $/=new Smarty();
        $/->template_dir= __DIR__ . '/../../templates/';
        $smarty->compile_dir= __DIR__ . '/../../templates_c/';
        $smarty->cache_dir= __DIR__ . '/../../cache/';
        
        return $smarty;
    }
}