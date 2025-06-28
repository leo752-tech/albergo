{include file='header.tpl' pageTitle='payment'}

<section class="section-padding payment-page">
    <div class="container">
        <div class="payment-card card">
            <h1 class="card-title text-center mb-4">Dettagli di Pagamento</h1>
            <p class="text-center text-muted mb-4">
                Inserisci i dettagli della tua carta di credito per completare la prenotazione.
                Questo è un sistema di pagamento **fittizio** a scopo dimostrativo e non elabora transazioni reali.
            </p>

            <form id="paymentForm" action="/albergoPulito/public/Booking/makeBooking" method="post">
                
                {if isset($bookingId)}
                    <input type="hidden" name="bookingId" value="{$bookingId}">
                {/if}

                {if isset($totalPrice)}
                    <input type="hidden" name="totalPrice" value="{$totalPrice|escape:'html'}">
                {/if}

                <div class="mb-3">
                    <label for="cardName" class="form-label">Nome sulla Carta</label>
                    <input type="text" class="form-control" id="cardName" name="cardName" placeholder="Nome Cognome" required>
                </div>

                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Numero della Carta</label>
                    {* INIZIO MODIFICA: Utilizzo di {literal} per l'attributo pattern *}
                    <input type="text" class="form-control" id="cardNumber" name="cardNumber" {literal}pattern="[0-9]{13,19}"{/literal} placeholder="XXXX XXXX XXXX XXXX" title="Inserisci un numero di carta valido (13-19 cifre)" required>
                    {* FINE MODIFICA *}
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiryMonth" class="form-label">Mese di Scadenza</label>
                        <select class="form-select" id="expiryMonth" name="expiryMonth" required>
                            <option value="">Mese</option>
                            {for $i=1 to 12}
                                <option value="{$i|string_format:'%02d'}">{$i|string_format:'%02d'}</option>
                            {/for}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="expiryYear" class="form-label">Anno di Scadenza</label>
                        <select class="form-select" id="expiryYear" name="expiryYear" required>
                            <option value="">Anno</option>
                            {$currentYear = "now"|date_format:"%Y"}
                            {for $i=0 to 10}
                                <option value="{$currentYear + $i}">{$currentYear + $i}</option>
                            {/for}
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV / CVC</label>
                    {* INIZIO MODIFICA: Utilizzo di {literal} per l'attributo pattern *}
                    <input type="text" class="form-control" id="cvv" name="cvv" {literal}pattern="[0-9]{3,4}"{/literal} placeholder="XXX" title="Inserisci il codice CVV (3 o 4 cifre)" required>
                    {* FINE MODIFICA *}
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Paga Ora</button>
                    <a href="/albergoPulito/public/Booking/showSummary/{if isset($bookingId)}{$bookingId}{else}0{/if}" class="btn btn-secondary btn-lg">Torna al Riepilogo</a>
                </div>
            </form>
        </div>
    </div>
</section>

{include file='footer.tpl'}