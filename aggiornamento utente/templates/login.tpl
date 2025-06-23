

{include file='header.tpl' pageTitle=$pageTitle}

<section id="auth-forms" class="container section-padding">
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

    <h2>Accedi al Tuo Account</h2>
    <form action="{$base_url}process_login.php" method="POST" class="auth-form">
        <div class="form-group">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" value="{$formData.email|default:''}" required>
        </div>
        <div class="form-group">
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary full-width">Accedi</button>
    </form>

    <h2 class="mt-5">Nuovo Utente? Registrati</h2>
    <p>Non hai un account? <a href="{$base_url}register.php">Registrati qui</a>.</p>

</section>

{include file='footer.tpl'}