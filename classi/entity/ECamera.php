q<?php

class ECamera{
	private ?int $idCamera;
	private string $nome;
	private int $posti;
	private int $prezzo; //prezzo per una notte
	private $tipo;

	public function __construct($nome, $posti, $prezzo, $tipo){
		$this->idCamera = null;
		$this->nome = $nome;
		$this->posti = $posti;
		$this->prezzo = $prezzo;
		$this->tipo = $tipo;
	}

	public function setId(int $idCamera){
		$this->idCamera = $idCamera;
	}
	public function getId(){
		return $this->idCamera;
	}

	public function setNome($nome){
		$this->nome = $nome;
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
}


?>