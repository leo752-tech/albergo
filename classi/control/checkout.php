<?php
require_once 'C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\config\config.php'; // Includi il file di configurazione
$publicKey = publicKey;
?>

<form action="/process-payment.php" method="post" id="payment-form">
  <div id="card-element">
    </div>
  <div id="card-errors" role="alert"></div>
  <button type="submit">Paga ora</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
  // Inizializza Stripe con la tua chiave pubblica
  var stripe = Stripe('<?php echo htmlspecialchars($publicKey); ?>'); // Chiave pubblica di test

  var elements = stripe.elements();
  var card = elements.create('card');

  // Aggiungi l'elemento card al div con id 'card-element'
  card.mount('#card-element');

  // Gestisci errori in tempo reale
  card.on('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Gestisci l'invio del form
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Impedisci l'invio del form tradizionale

    // Crea un token o una PaymentMethod
    stripe.createPaymentMethod({
      type: 'card',
      card: card,
    }).then(function(result) {
      if (result.error) {
        // Mostra errori all'utente
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Il token (o PaymentMethod ID) è stato creato con successo
        // Invia il PaymentMethod ID al tuo server PHP
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethodId');
        hiddenInput.setAttribute('value', result.paymentMethod.id);
        form.appendChild(hiddenInput);

        // Aggiungi altri dati della prenotazione (es. importo, ID prenotazione)
        var amountInput = document.createElement('input');
        amountInput.setAttribute('type', 'hidden');
        amountInput.setAttribute('name', 'amount');
        amountInput.setAttribute('value', 15000); // Esempio: 150.00 EUR (15000 centesimi)
        form.appendChild(amountInput);

        // Invia il form al tuo server
        form.submit();
      }
    });
  });
</script>