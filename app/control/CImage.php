<?php
require_once(__DIR__ . '/../utility/autoloader.php');
class CImage{

    public static function upload($idRoom){
        for($i=0; $i<count(UHTTP::files(['image','name'], $i)); $i++){
            $result = is_uploaded_file(UHTTP::files(['image','tmp_name'], $i));
            $max_size = 3000000; //3MB
            if (!$result)
            {
                echo "Impossibile eseguire l'upload.";
                return false;
            } else {
                $size = UHTTP::files(['image','size'], $i);
                if ($size > $max_size){
                    echo "File troppo grande!";
                    return false;
                }
                $nome = UHTTP::files(['image','name'], $i);
                $tipo = UHTTP::files(['image', 'type'], $i);
                $immagine = file_get_contents(UHTTP::files(['image','tmp_name'], $i));
                $immagine = addslashes ($immagine);
                // grazie alla variabile $type è possibile filtrare rispetto al tipo di
                // file caricato (es. ammesse solo immagini di tipo .gif)

                $image = new EImage(null, $idRoom, $nome, $immagine, $tipo);
                $result = FpersistentManager::getInstance()->saveObject($image);  

                print "file $nome inserito correttamente!";
                return true;
            }
        
        }
    }

}