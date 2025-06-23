

{include file='admin/header_admin.tpl' pageTitle='Modifica Utente'}

<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifica Utente</h1>
    </div>

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

    {* Il form per la modifica dell'utente *}
    <div class="form-grid">
        <form action="{$base_url}admin/process_edit_user.php?id={$user->getIdUser()|default:''}" method="POST">
            <input type="hidden" name="idUser" value="{$user->getIdUser()|default:''}">
            
            <div class="form-group">
                <label for="firstName">Nome:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="{$user->getFirstName()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="lastName">Cognome:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="{$user->getLastName()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{$user->getEmail()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (lascia vuoto per non modificare):</label>
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <div class="form-group">
                <label for="birthDate">Data di Nascita:</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$user->getBirthDate()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="birthPlace">Luogo di Nascita:</label>
                <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$user->getBirthPlace()|default:''}" required>
            </div>
            <div class="form-group">
                <label for="role">Ruolo:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="cliente" {if $user->getRole() eq 'cliente'}selected{/if}>Cliente</option>
                    <option value="admin" {if $user->getRole() eq 'admin'}selected{/if}>Amministratore</option>
                </select>
            </div>
            <div class="form-group full-width">
                <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                <a href="{$base_url}admin/users.php" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
</div>

{include file='admin/footer_admin.tpl'}