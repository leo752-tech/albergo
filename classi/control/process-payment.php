<?php
require_once 'vendor/autoload.php'; // Carica le dipendenze di Composer
require_once "C:\Users\momok\Documents\Programmazione_web\progetto\albergo2.0\albergo\classi\config\config.php";

\Stripe\Stripe::setApiKey('privateKey'); // Chiave segreta (DEVE essere protetta)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentMethodId = $_POST['paymentMethodId'] ?? null;
    $amount = $_POST['amount'] ?? null; // Importo in centesimi (es. 15000 per 150.00 EUR)
    $currency = 'eur'; // Valuta

    if (!$paymentMethodId || !$amount) {
        // Gestisci errore: dati mancanti
        header('Location: /error.php?msg=Dati di pagamento mancanti.');
        exit;
    }

    try {
        // 1. Creare un PaymentIntent (raccomandato da Stripe)
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
            'payment_method' => $paymentMethodId,
            'confirmation_method' => 'manual', // O 'automatic' se non è richiesta autenticazione 3D Secure
            'confirm' => true,
            // 'description' => 'Prenotazione hotel [ID prenotazione]', // Descrizione per Stripe
            // 'metadata' => ['booking_id' => '12345'], // Metadati utili
        ]);

        // 2. Gestire lo stato del PaymentIntent
        if ($paymentIntent->status == 'succeeded') {
            // Pagamento riuscito
            // Aggiorna lo stato della prenotazione nel tuo database
            // Invia email di conferma all'utente
            header('Location: /success.php?booking_id=XXX'); // Reindirizza a pagina di successo
            exit;
        } elseif ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
            // Richiede un'azione (es. 3D Secure)
            // Devi reindirizzare l'utente al frontend per completare l'autenticazione
            // Questo richiede una gestione più complessa via JavaScript
            // Per semplicità, spesso si usa Stripe Checkout o si gestisce il reindirizzamento in JavaScript
            // In un'applicazione reale, dovresti inviare 'client_secret' al frontend e gestire la conferma lì.
            header('Location: /error.php?msg=Richiesta autenticazione 3D Secure. Riprova o contatta il supporto.');
            exit;

        } else {
            // Pagamento in stato sconosciuto o fallito
            // Logga l'errore per debugging
            error_log('Stripe PaymentIntent status: ' . $paymentIntent->status);
            header('Location: /error.php?msg=Errore durante l\'elaborazione del pagamento. Stato: ' . $paymentIntent->status);
            exit;
        }

    } catch (\Stripe\Exception\CardException $e) {
        // Errore specifico della carta (es. carta rifiutata, fondi insufficienti)
        $error = $e->getError()->message;
        header('Location: /error.php?msg=Errore nella carta: ' . urlencode($error));
        exit;
    } catch (\Stripe\Exception\RateLimitException $e) {
        // Troppe richieste al gateway
        header('Location: /error.php?msg=Troppe richieste. Riprova più tardi.');
        exit;
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Parametri non validi
        header('Location: /error.php?msg=Errore nei parametri della richiesta.');
        exit;
    } catch (\Stripe\Exception\AuthenticationException $e) {
        // Chiave API non valida
        header('Location: /error.php?msg=Autenticazione Stripe fallita. Contatta l\'amministratore.');
        exit;
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Errore di connessione alla rete Stripe
        header('Location: /error.php?msg=Impossibile connettersi al servizio di pagamento.');
        exit;
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Errore generico dell'API Stripe
        header('Location: /error.php?msg=Errore API Stripe: ' . urlencode($e->getMessage()));
        exit;
    } catch (Exception $e) {
        // Qualsiasi altro errore inaspettato
        header('Location: /error.php?msg=Errore interno del server durante il pagamento.');
        exit;
    }
} else {
    // Accesso diretto allo script non consentito
    header('Location: /');
    exit;
}
?>