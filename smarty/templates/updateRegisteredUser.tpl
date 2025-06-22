{include file='header_admin.tpl' pageTitle='Inserisci un utente'}

<div class="container">
    <h2>Aggiorna account</h2>

    

    <form action="/albergoPulito/public/Admin/updateRegisteredUser" method="post">
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate">
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Utente</button>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

{include file='footer_admin.tpl'}