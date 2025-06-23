<?php
class EImage {
    private ?int $idImage;
    private int $idRoom;
    private string $name;
    private string $filePath; // Cambiato da $imageData a $filePath
    private string $mimeType; // MimeType è ancora utile per la visualizzazione e la validazione

    public function __construct(?int $idImage = null, int $idRoom, string $name, string $filePath, string $mimeType){
        $this->idImage = $idImage;
        $this->idRoom = $idRoom;
        $this->name = $name;
        $this->filePath = $filePath; // Ora è il percorso del file
        $this->mimeType = $mimeType;
    }

    public function getId(): int {
        return $this->idImage;
    }
    public function setId(int $id) {
        $this->idImage = $id;
    }

    public function getIdRoom(): int {
        return $this->idRoom;
    }
    public function setIdRoom(int $id) {
        $this->idRoom = $id;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name) {
        $this->name = $name;
    }

    public function getFilePath(): string { 
        return $this->filePath;
    }
    public function setFilePath(string $filePath) {
        $this->filePath = $filePath;
    }

    public function getMimeType(): string { 
        return $this->mimeType;
    }
    public function setMimeType(string $mimeType) { 
        $this->mimeType = $mimeType;
    }
}
?>