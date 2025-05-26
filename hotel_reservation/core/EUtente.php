<?php

class Eutente{
	
	protected ?int $idUtente;
	protected string $nome;
	protected string $cognome;
	protected string $dataN;
	protected string $comuneN;

	public function __construct($nome, $cognome, $dataN, $comuneN){
		$this->idUtente = null;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->dataN = $dataN;
		$this->comuneN = $comuneN;
	}

	public function setIdUtente($idUtente){
		$this->idUtente = $idUtente;
	}
	public function getIdUtente(){
		return $this->idUtente;
	}

	public function setNome(string $nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCognome(string $cognome){
		$this->cognome = $cognome;
	}
	public function getCognome(){
		return $this->cognome;
	}
	public function setDataN(string $dataN){
		$this->dataN = $dataN;
	}
	public function getDataN(){
		return $this->dataN;
	}
	public function setComuneN(string $comuneN){
		$this->comuneN = $comuneN;
	}
	public function getComuneN(){
		return $this->comuneN;
	}
}


?>
