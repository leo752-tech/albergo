{include file='header.tpl' pageTitle='Il Mio Profilo'}

<main>
    <div class="container user-profile">
        <h2>Il Tuo Profilo</h2>

        <div class="profile-details card"> <div class="card-title">Dettagli Utente</div> <div class="detail-item">
                <strong>Nome:</strong> {$user->getFirstName()}
            </div>
            <div class="detail-item">
                <strong>Cognome:</strong> {$user->getLastName()}
            </div>
            <div class="detail-item">
                <strong>Email:</strong> {$user->getEmail()}
            </div>
            <div class="detail-item">
                <strong>Data di Nascita:</strong> {$birthDate}
            </div>
            <div class="detail-item">
                <strong>Luogo di Nascita:</strong> {$user->getBirthPlace()}
            </div>
            <div class="detail-item">
                <strong>Stato Account:</strong>
                {if $user->getIsBanned()}
                    <span style="color: red; font-weight: bold;">Bannato</span>
                {else}
                    Attivo
                {/if}
            </div>
            {* Puoi anche mostrare ID utente se necessario, anche se di solito non sono per l'utente finale *}
            {*
            <div class="detail-item">
                <strong>ID Utente Registrato:</strong> {$user->getIdRegisteredUser()}
            </div>
            *}
        </div>

        <div class="profile-actions">
            <a href="/albergoPulito/public/User/showUpdateAccount" class="btn btn-primary">Modifica Profilo</a>
            <a href="/albergoPulito/public/User/showUpdatePassword" class="btn btn-secondary">Cambia Password</a>
            <a href="/albergoPulito/public/Booking/myBookings" class="btn btn-primary">Le Mie Prenotazioni</a>
        </div>
    </div>
</main>

{include file='footer.tpl'}  