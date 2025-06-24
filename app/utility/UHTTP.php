<?php

//classe che contiene i metodi per accedere agli array superglobali POST E FILES
class UHTTP{

    
    public static function post($parametro){
        if(isset($_POST[$parametro])){
            return $_POST[$parametro];
        }
    }
       /* public static function post(string $key): ?string {
        // Usa l'operatore di coalescenza ?? per restituire null se la chiave non esiste
        // oppure un valore diverso se preferisci, ad esempio una stringa vuota: $_POST[$key] ?? '';
        return $_POST[$key] ?? null;
    }*/

    public static function getReferer(){
        return $_SERVER['HTTP_REFERER'];
    }

    public static function files($file){
        $uploadedFiles = [];

        // Controlla se 'room_images' esiste e se contiene file caricati
        if (isset($_FILES[$file]) && is_array($_FILES[$file]['name'])) {
            $fileCount = count($_FILES[$file]['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                // Se non ci sono errori per questo file specifico
                if ($_FILES[$file]['error'][$i] === UPLOAD_ERR_OK) {
                    $uploadedFiles[] = [
                        'name' => $_FILES[$file]['name'][$i],
                        'type' => $_FILES[$file]['type'][$i],
                        'tmp_name' => $_FILES[$file]['tmp_name'][$i],
                        'error' => $_FILES[$file]['error'][$i],
                        'size' => $_FILES[$file]['size'][$i],
                        // 'full_path' => $_FILES['room_images']['full_path'][$i] // Abilita se usi PHP 8.1+ e ti serve
                    ];
                } else {
                    // Gestisci errori di caricamento per singoli file se necessario
                    // Esempio: loggare l'errore o ignorare il file problematico
                    error_log("Errore caricamento file '{$_FILES[$file]['name'][$i]}': Codice errore {$_FILES[$file]['error'][$i]}");
                }
            }
        }

        return $uploadedFiles;
    }
        
}

