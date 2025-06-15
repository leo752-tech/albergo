<?php

class ESpecialOffer{

    private int $idSpecialOffer;
    private string $title;
    private string $description;
    private int $length;
    private float $specialPrice;

    public function __construct(?int $idSpecialOffer = null, string $title, string $description, int $length, float $specialPrice){
        $this->idSpecialOffer = $idSpecialOffer;
        $this->title = $title;
        $this->description = $description;
        $this->length = $length;
        $this->specialPrice = $specialPrice;
    }

    public function setIdSpecialOffer(?int $id){
        $this->idSpecialOffer = $id;
    }
    public function getIdSpecialOffer(): ?int{
        return $this->idSpecialOffer;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }
    public function getTitle(): string{
        return $this->title;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }
    public function getDescription(): string{
        return $this->description;
    }

    public function setLength(int $length){
        $this->length = $length;
    }
    public function getLength(): int{
        return $this->length;
    }

    public function setSpecialPrice(float $specialPrice){
        $this->specialPrice = $specialPrice;
    }
    public function getSpecialPrice(): float{
        return $this->specialPrice;
    }




}