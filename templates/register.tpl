{include file='header.tpl' pageTitle=$pageTitle} {* Assumi un header generico *}

<div class="container">
    <h2>Registrazione Nuovo Utente</h2>

    {if $registrationError}
        <div class="alert alert-danger" role="alert">
            {$registrationError}
        </div>
    {/if}
    {if $registrationSuccess}
        <div class="alert alert-success" role="alert">
            {$registrationSuccess}
        </div>
    {/if}

    <form action="/hotel_reservation/process_register.php" method="POST">
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{$formData.firstName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{$formData.lastName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$formData.birthDate|default:''}">
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$formData.birthPlace|default:''}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{$formData.email|default:''}" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Conferma Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrati</button>
    </form>
    <p class="mt-3">Hai già un account? <a href="/hotel_reservation/login.php">Accedi qui</a></p>
</div>

{include file='footer.tpl'} {* Assumi un footer generico *}