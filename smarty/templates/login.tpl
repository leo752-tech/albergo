{include file = 'header.tpl'}

<section id="auth-forms" class="container section-padding">
    <h2>Accedi al Tuo Account</h2>
    <form action="process_login.php" method="POST" class="auth-form">
        <div class="form-group">
            <label for="login-email">Email:</label>
            <input type="email" id="login-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary full-width">Accedi</button>
    </form>

    <h2 class="mt-5">Nuovo Utente? Registrati</h2>
    <form action="process_register.php" method="POST" class="auth-form">
        <div class="form-group">
            <label for="reg-nome">Nome:</label>
            <input type="text" id="reg-nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="reg-cognome">Cognome:</label>
            <input type="text" id="reg-cognome" name="cognome" required>
        </div>
        <div class="form-group">
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="email" required>
        </div>
        <div class="form-group">
            <label for="reg-password">Password:</label>
            <input type="password" id="reg-password" name="password" required>
        </div>
        <div class="form-group">
            <label for="reg-dataNascita">Data di Nascita:</label>
            <input type="date" id="reg-dataNascita" name="data_nascita" required>
        </div>
        <div class="form-group">
            <label for="reg-comuneNascita">Comune di Nascita:</label>
            <input type="text" id="reg-comuneNascita" name="comune_nascita" required>
        </div>
        <button type="submit" class="btn btn-secondary full-width">Registrati</button>
    </form>
</section>

{include file = 'footer.tpl'}