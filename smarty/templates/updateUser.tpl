
{include file='header_admin.tpl'}

<div class="container">
    <h2>Aggiorna i dati dell'utente</h2>

    

    <form action="/albergoPulito/public/Admin/updateUser" method="post">
        <input type="hidden" name="idUser" >
        
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{$user->getFirstName()|default:''}">
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{$user->getLastName()|default:''}">
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$user->getBirthDate()->format('d-m-Y')|default:''}">
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$user->getBirthPlace()|default:''}">
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="/albergoPulito/public/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

{include file='footer_admin.tpl'}
