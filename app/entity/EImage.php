<?php
class EImage{

    private ?int $idImage;
    private int $idRoom;
    private string $name;
    private $imageData;
    private $mimeType;

    public function __construct(?int $idImage = null, int $idRoom, string $name, $imageData, $mimeType){
        $this->idImage = $idImage;
        $this->idRoom = $idRoom;
        $this->name = $name;
        $this->imageData = $imageData;
        $this->mimeType = $mimeType;
    }

    public function getId(): int{
        return $this->idImage;
    }
    public function setId(int $id){
        $this->idImage = $id;
    }

    public function getIdRoom(): int{
        return $this->idRoom;
    }
    public function setIdRoom(int $id){
        $this->idRoom = $id;
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    public function getImageData(){
        return $this->imageData;
    }
    public function setImageData($imageData){
        $this->imageData = $imageData;
    }

    public function getMimeType(){
        return $this->mimeType;
    }
    public function set($mimeType){
        $this->mimeType = $mimeType;
    }


}