<?php

class Camera{
	private int $id;
	private string $nome;
	private int $posti;
	//prezzo per ogni notte
	private int $prezzo;
	private $tipo;
	//coppie Data=>bool
	private $disponibilità = array();
	//elenco delle prenotazioni effettuate su questa camera
	private $prenotazioni = array();

	public function __construct($id, $posti, $prezzo, $tipo){
		$this->id = $id;
		$this->nome = "Camera " . strval($id);
		$this->posti = $posti;
		$this->tipo = $tipo;
		//da modificare in base alle politiche
		$this->prezzo = $prezzo;
	}

	public function setId(int $id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setPosti(int $posti){
		$this->posti = $posti;
	}
	public function getPosti(){
		return $this->posti;
	}

	public function setPrezzo(int $prezzo){
		$this->prezzo = $prezzo;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}

	public function setTipo(int $tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}

	public function setDisponibilità(bool $disponibilità){
		$this->disponibilità = $disponibilità;
	}
	public function getDisponibilità(){
		return $this->disponibilità;
	}

}


?>
