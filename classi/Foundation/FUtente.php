<?php

class FCamera{

	private $connection;

	public function __construct() {

        global $hostname, $user, $pass, $dbname ;
        var_dump($hostname);
        $this->connect( $hostname, $user, $pass, $dbname );

    }

    private function connect( $hostname, $user, $pass, $dbname  ) {

        try {
            $this->connection = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        } catch ( PDOException $e) {
            print $e->getMessage() . "\n";
            exit;
        } 
        return true;
    }

    public function close() {

        $this->connection = null;
    }

    public function getCamere($query){
    	$stm = $this->connection->query($query);
    	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

    	$results = array();
        foreach ( $rows as $row ) {
            $tmp = new Utente( $row['username'], $row['password'], $row['nome'], $row['cognome'], $row['dataN'], $row['comuneN'] );
            $results[] = $tmp;
        }
        return $results;
    } 
}

?>