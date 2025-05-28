 <?php

class FRecensione{

    private static $key = "idRecensione";

    private static $class = "FRecensione";
   
    private static $table = "recensione";
   
    private static $values = "(NULL,:titolo,:valutazione,:descrizione,:data,:idUtente)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$recensione) { 
        $stmt->bindValue(":titolo", $recensione->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(":valutazione", $recensione->getValutazione(), PDO::PARAM_INT);
        $stmt->bindValue(":descrizione", $recensione->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(":data", $recensione->getData(), PDO::PARAM_STR);
        $stmt->bindValue(":idUtente", $recensione->getIdUtente(), PDO::PARAM_INT);     
    }

    public static function getKey(){
        return self::$key;
    }
    
    public static function getClass(){
        return self::$class;
    }

    public static function getTable(){
        return self::$table;
    }

    public static function getValues(){
        return self::$values;
    }

    //crea un oggetto ECamera
    public static function creaRecensione($queryRes){
        $recensione = new ERecensione($queryRes["titolo"], $queryRes["valutazione"], $queryRes["descrizione"], $queryRes["data"], $queryRes["idUtente"]);
        if (isset($queryRes["idRecensione"])) { 
            $recensione->setId($queryRes["idRecensione"]);
        }
        return $recensione;
    }

    //recupera un oggetto EUtente tramite il suo id
    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $recensione = self::creaRecensione($result);
            return $recensione;
        }else{
            return null;
        }
    }

    //salva l'oggetto utente se non esiste, altrimenti fa un aggiornamento
    public static function salvaOggetto($oggetto , $campi = null){
        if($campi === null){
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            FDataMapper::getInstance()->commit();
            if($id !== null){
                $oggetto->setId($id);
                return true;
            }else{
                return false;
            }
        else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getId());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            }
        }
    }

    //cancella un oggetto dal db
    public static function cancellaRecensione($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Recensione non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}

?>