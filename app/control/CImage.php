<?php

class CImage{

    public static function upload($idRoom){
        $result = is_uploaded_file(UHTTP::file(['file','tmp_name']));
        $max_size = 3000000; //3MB
        if (!$result)
        {
            echo "Impossibile eseguire l'upload.";
            return false;
        } else {
            $size = UHTTP::file(['file','size']);
            if ($size > $max_size){
                echo "File troppo grande!";
                return false;
            }
            $nome = UHTTP::file(['file','name']);
            $immagine = file_get_contents(UHTTP::file(['file','tmp_name']););
            $immagine = addslashes ($immagine);
            // grazie alla variabile $type è possibile filtrare rispetto al tipo di
            // file caricato (es. ammesse solo immagini di tipo .gif)

            $image = new EImage(null, $idRoom, $name, )
            FpersistentManager::getInstance()->saveObject($image);  

            print "file $nome inserito correttamente!";
            return true;
  }
    }

}