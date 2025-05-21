<?php

class Data{
	private $data;
	private string $dataF;
	private string $giorno;
	private string $mese;
	private string $anno;

	public function __construct(){
		$d = new DateTime();
		$this->data = $d;
		$this->dataF = $this->data->format("d-m-Y");
		$this->giorno = substr($this->dataF, 0, 2);
		$this->mese = substr($this->dataF, 3, 2);
		$this->anno = substr($this->dataF, 6, 4);
	}

	public function getData(){
		return $this->data;
	}
	public function getDataF(){
		return $this->dataF;
	}
	public function getGiorno(){
		return $this->giorno;
	}
	public function getMese(){
		return $this->mese;
	}
	public function getAnno(){
		return $this->anno;
	}
}

?>