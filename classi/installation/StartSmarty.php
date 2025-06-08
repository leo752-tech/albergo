<?php
namespace albergo\classi\installation; // Aggiungi il namespace

use Smarty; // Importa la classe Smarty di Composer
class StartSmarty{
    static function configuration(){
        $smarty=new Smarty();
        $smarty->template_dir= __DIR__ . '/../libs/sm/templates/';
        $smarty->compile_dir= __DIR__ . '/../libs/sm/templates_c/';
        $smarty->config_dir= __DIR__ . '/../libs/sm/configs/';
        $smarty->cache_dir= __DIR__ . '/../libs/sm/cache/';
        return $smarty;
    }
}