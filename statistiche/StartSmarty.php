<?php


require(__DIR__ . '/../../smarty/libs/Smarty.class.php');

class StartSmarty{
    public static function configuration(){


        $path = __DIR__ . '/../../smarty';
        $smarty = new Smarty();
        $smarty->setTemplateDir($path . '/templates');   
        

        $smarty->setCompileDir( $path . '/templates_c');  
        

        $smarty->setCacheDir( $path . '/cache');
        $smarty->setConfigDir( $path . '/configs');	
		$smarty->registerPlugin('modifier', 'json_encode', 'json_encode');
        
        return $smarty;
    }
}