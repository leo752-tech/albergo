<?php

//classe che contiene i metodi per accedere agli array superglobali POST E FILES
class UHTTP{

    
  public static function post($parametro){
        return $_POST[$parametro];
    }
       /* public static function post(string $key): ?string {
        // Usa l'operatore di coalescenza ?? per restituire null se la chiave non esiste
        // oppure un valore diverso se preferisci, ad esempio una stringa vuota: $_POST[$key] ?? '';
        return $_POST[$key] ?? null;
    }*/

    public static function files($parametri){
        if (count($parametri)  == 1) return $_FILES[$parametri[0]];
        else if (count($parametri) == 2) return $_FILES[$parametri[0]][$parametri[1]];
        else if (count($parametri) == 3) return $_FILES[$parametri[0]][$parametri[1]][$parametri[2]];
        else if (count($parametri) == 4) return $_FILES[$parametri[0]][$parametri[1]][$parametri[2]][$parametri[3]];
        else return $_FILES[$parametri[0]][$parametri[1]][$parametri[2]][$parametri[3]][$parametri[4]];
    }
}
