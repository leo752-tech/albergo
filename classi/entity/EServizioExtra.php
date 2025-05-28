<?php
class EServizioExtra{
	private ?int $idServizioExtra;
	private $nome;
	private $descrizione;
	private $prezzo;

	public function __construct($nome, $descrizione, $prezzo){
		$this->idServizioExtra = null;
		$this->nome = $nome;
		$this->descrizione = $descrizione;
		$this->prezzo = $prezzo;
	}

	public function setId($id){
		$this->idServizioExtra = $id;
	}
	public function getId(){
		return $this->idServizioExtra;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setDescrizione($descrizione){
		$this->descrizione = $descrizione;
	}
	public function getDescrizione(){
		return $this->descrizione;
	}

	public function setPrezzo($prezzo){
		$this->prezzo = $prezzo;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}
}

?>