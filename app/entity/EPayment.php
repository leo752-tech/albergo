<?php

class EPayment {
    private ?int $idPayment;       // ID univoco del pagamento (se salvato nel DB)
    private int $idBooking;        // ID della prenotazione a cui si riferisce il pagamento
    private float $amount;         // Importo del pagamento
    private DateTime $paymentDate;   // Data e ora del pagamento (stringa o DateTime)
    private string $lastFourDigits;// Ultime 4 cifre del numero della carta (per riferimento)
    private string $cardHolderName;// Nome titolare della carta (per riferimento)

    public function __construct(?int $idPayment = null, int $idBooking,float $amount,?DateTime $paymentDate = null, string $lastFourDigits,string $cardHolderName){
        $this->idPayment = $idPayment;
        $this->idBooking = $idBooking;
        $this->amount = $amount;
        $this->paymentDate = $paymentDate ?? new DateTime();
        $this->lastFourDigits = $lastFourDigits;
        $this->cardHolderName = $cardHolderName;
    }

    public function setId(int $id){
        $this->idPayment = $id;
    }

    // --- Metodi Getters ---
    public function getId(): ?int {
        return $this->idPayment;
    }

    public function getIdBooking(): int {
        return $this->idBooking;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getPaymentDate(): DateTime {
        return $this->paymentDate;
    }

    public function getLastFourDigits(): string {
        return $this->lastFourDigits;
    }

    public function getCardHolderName(): string {
        return $this->cardHolderName;
    }

    

    // Puoi aggiungere altri setter se ritieni necessario modificare gli altri attributi
    // dopo l'inizializzazione, ma per un pagamento sono spesso immutabili
}

?>