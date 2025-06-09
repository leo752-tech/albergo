<?php
// File: C:\xampp\htdocs\albergo2.0\albergo\index.php

// Includi il file di configurazione per ottenere la chiave pubblica di Stripe
require_once "C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\config\config.php";

// Ottieni la chiave pubblica da usare nel JavaScript
$publicKey = publicKey;
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        h1 { text-align: center; color: #333; }
        .form-row { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        #card-element { border: 1px solid #ccc; padding: 12px; border-radius: 4px; background-color: #fdfdfd; }
        #card-errors { color: red; margin-top: 10px; }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Paga per la tua Prenotazione</h1>
        <form action="classi\control\process-payment.php" method="post" id="payment-form">
            <div class="form-row">
                <label for="amount">Importo (es. 150.00 EUR):</label>
                <input type="text" id="display-amount" value="150.00 EUR" readonly style="width: calc(100% - 24px); padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #eee;">
            </div>

            <div class="form-row">
                <label for="card-element">Dettagli Carta di Credito:</label>
                <div id="card-element">
                    </div>
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit">Paga ora</button>
        </form>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Inizializza Stripe con la tua CHIAVE PUBBLICA di test
        // SOSTITUISCI 'pk_test_YOUR_PUBLISHABLE_KEY' con la tua chiave pubblica di test reale di Stripe
        var stripe = Stripe('<?php echo htmlspecialchars($publicKey); ?>');

        // Crea un'istanza di Elements.
        var elements = stripe.elements();

        // Crea un elemento 'card'.
        var card = elements.create('card');

        // Aggiungi un'istanza dell'elemento 'card' al div 'card-element'.
        card.mount('#card-element');

        // Gestisci errori in tempo reale dell'input della carta.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Gestisci l'invio del form.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Impedisci l'invio del form tradizionale

            // Crea un PaymentMethod quando il form è inviato
            stripe.createPaymentMethod({
                type: 'card',
                card: card,
            }).then(function(result) {
                if (result.error) {
                    // Mostra errori all'utente (es. "Numero di carta non valido")
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Il PaymentMethod ID è stato creato con successo
                    // Invia il PaymentMethod ID al tuo server PHP
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'paymentMethodId');
                    hiddenInput.setAttribute('value', result.paymentMethod.id);
                    form.appendChild(hiddenInput);

                    // Aggiungi l'importo della prenotazione come input nascosto (in centesimi)
                    // Questo DEVE corrispondere al valore della tua prenotazione reale.
                    // Esempio: 150.00 EUR = 15000 centesimi
                    var amountInput = document.createElement('input');
                    amountInput.setAttribute('type', 'hidden');
                    amountInput.setAttribute('name', 'amount');
                    amountInput.setAttribute('value', 15000); // 150 EUR in centesimi
                    form.appendChild(amountInput);

                    // Qui potresti aggiungere altri dati nascosti della prenotazione, es. booking_id
                    // var bookingIdInput = document.createElement('input');
                    // bookingIdInput.setAttribute('type', 'hidden');
                    // bookingIdInput.setAttribute('name', 'booking_id');
                    // bookingIdInput.setAttribute('value', 'ABC123XYZ');
                    // form.appendChild(bookingIdInput);

                    // Ora invia il form al tuo script PHP di elaborazione del pagamento
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>