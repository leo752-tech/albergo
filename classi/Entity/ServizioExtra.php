<?php
class ServizioExtra{
	private $nome;
	private $descrizione;
	private $prezzo;

	public function __constructor($nome, $descrizione, $prezzo){
		$this->nome = $nome;
		$this->descrizione = $descrizione;
		$this->prezzo = $prezzo;
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
