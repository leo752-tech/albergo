<?php

class ERoom{
    private ?int $id;
    private string $name;
    private int $beds;
    private int $price;
    private $type;

    public function __construct(string $name, int $beds, int $price, $type){
        $this->id = null;
        $this->name = $name;
        $this->beds = $beds;
        $this->price = $price;
        $this->type = $type;
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function getId(): ?int{
        return $this->id;
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

    public function setPrice(int $price){
        $this->price = $price;
    }
    public function getPrice(): int{
        return $this->price;
    }

    public function setType(string $type){
        $this->type = $type;
    }
    public function getType(){
        return $this->type;
    }
}

?>o