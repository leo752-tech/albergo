
{include file='header_admin.tpl' pageTitle=$pageTitle}

<div class="container">
    <h2>{$pageTitle}</h2>

    {if $errorMessage}
        <div class="alert alert-danger" role="alert">
            {$errorMessage}
        </div>
    {/if}
    {if $successMessage}
        <div class="alert alert-success" role="alert">
            {$successMessage}
        </div>
    {/if}

    <form action="/~momok/Admin/updateUser" method="post">
        <input type="hidden" name="idUser" value="{$idUser}">
        
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" required>
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        <a href="/~momok/Admin/manageUsers" class="btn btn-secondary">Annulla</a>
    </form>
</div>

{include file='footer_admin.tpl'}
