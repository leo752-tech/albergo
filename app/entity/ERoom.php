<?php

class ERoom{
    private ?int $idRoom;
    private string $name;
    private int $beds;
    private float $price;
    private string $type;
    private string $description;

    public function __construct(?int $idRoom = null, string $name, int $beds, float $price, string $type, string $description){
        $this->idRoom = $idRoom;
        $this->name = $name;
        $this->beds = $beds;
        $this->price = $price;
        $this->type = $type;
        $this->description = $description;
    }

    public function setId(int $id){
        $this->idRoom = $id;
    }
    public function getId(): ?int{
        return $this->idRoom;
    }

    public function setName(string $name){
        $this->name = $name;
    }
    public function getName(): string{
        return $this->name;
    }

    public function setBeds(int $beds){
        $this->beds = $beds;
    }
    public function getBeds(): int{
        return $this->beds;
    }

    public function setPrice(float $price){
        $this->price = $price;
    }
    public function getPrice(): float{
        return $this->price;
    }

    public function setType(string $type){
        $this->type = $type;
    }
    public function getType(): string{
        return $this->type;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }
    public function getDescription(): string{
        return $this->description;
    }
}

?>
