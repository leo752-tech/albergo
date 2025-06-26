<?php

class EExtraService{
	private ?int $idExtraService;
	private string $name;
	private string $description;
	private float $price;
	private string $pathImage;

	public function __construct(?int $idExtraService = null, string $name, string $description, float $price, string $pathImage){
		$this->idExtraService = $idExtraService;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->pathImage = $pathImage;
	}

	public function setId(int $id){
		$this->idExtraService = $id;
	}
	public function getId(): ?int{
		return $this->idExtraService;
	}

	public function setName(string $name){
		$this->name = $name;
	}
	public function getName(): string{
		return $this->name;
	}

	public function setDescription(string $description){
		$this->description = $description;
	}
	public function getDescription(): string{
		return $this->description;
	}

	public function setPrice(float $price){
		$this->price = $price;
	}
	public function getPrice(): float{
		return $this->price;
	}

	public function setPathImage(string $pathImage){
		$this->pathImage = $pathImage;
	}
	public function getPathImage(): string{
		return $this->pathImage;
	}
}

?>