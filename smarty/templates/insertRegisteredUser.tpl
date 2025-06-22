{include file='header_admin.tpl' pageTitle='Inserisci un utente'}

<div class="container">
    <h2>Inserisci un utente con account</h2>

    

    <form action="/albergoPulito/public/Admin/insertRegisteredUser" method="post">
        <div class="form-group">
            <label for="firstName">Nome:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{$firstName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="lastName">Cognome:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{$lastName|default:''}" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Data di Nascita:</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$birthDate|default:''}" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Luogo di Nascita:</label>
            <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$birthPlace|default:''}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="birthPlace">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Utente</button>
        <a href="/albergoPulito/public" class="btn btn-secondary">Annulla</a>
    </form>
</div>

{include file='footer_admin.tpl'}