<?php

class Eutente{
	
	protected ?int $idUtente;
	protected string $nome;
	protected string $cognome;
	protected DateTime $dataNascita;
	protected string $comuneNascita;

	public function __construct(?int $idUtente = null, $nome, $cognome, $dataNascita, $comuneNascita){
		$this->idUtente = $idUtente;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->dataNascita = $dataNascita;
		$this->comuneNascita = $comuneNascita;
	}

	public function setId($id){
		$this->idUtente = $id;
	}
	public function getId(){
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
	public function setDataNascita(string $dataNascita){
		$this->dataNascita = $dataNascita;
	}
	public function getDataNascita(){
		return $this->dataNascita;
	}
	public function setComuneNascita(string $comuneNascita){
		$this->comuneNascita = $comuneNascita;
	}
	public function getComuneNascita(){
		return $this->comuneNascita;
	}
}


?>