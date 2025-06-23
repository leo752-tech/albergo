

{include file='header.tpl' pageTitle=$pageTitle}

<section id="register-form" class="container section-padding">
    <h2>Registrazione Nuovo Utente</h2>

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

    <form action="{$base_url}process_register.php" method="POST" class="auth-form">
        <div class="form-group">
            <label for="reg-nome">Nome:</label>
            <input type="text" id="reg-nome" name="firstName" value="{$formData.firstName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="reg-cognome">Cognome:</label>
            <input type="text" id="reg-cognome" name="lastName" value="{$formData.lastName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="email" value="{$formData.email|default:''}" required>
        </div>
        <div class="form-group">
            <label for="reg-password">Password:</label>
            <input type="password" id="reg-password" name="password" required>
        </div>
        <div class="form-group">
            <label for="reg-confirm-password">Conferma Password:</label>
            <input type="password" id="reg-confirm-password" name="confirmPassword" required>
        </div>
        <div class="form-group">
            <label for="reg-dataNascita">Data di Nascita:</label>
            <input type="date" id="reg-dataNascita" name="birthDate" value="{$formData.birthDate|default:''}" required>
        </div>
        <div class="form-group">
            <label for="reg-comuneNascita">Luogo di Nascita:</label>
            <input type="text" id="reg-comuneNascita" name="birthPlace" value="{$formData.birthPlace|default:''}" required>
        </div>
        <button type="submit" class="btn btn-primary full-width">Registrati</button>
    </form>

    <p class="mt-3 text-center">Hai già un account? <a href="{$base_url}login.php">Accedi qui</a>.</p>
</section>

{include file='footer.tpl'}