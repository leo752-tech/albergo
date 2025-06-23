

{include file='header.tpl' pageTitle='Il Mio Profilo'}

<section id="user-profile" class="container section-padding">
    <h2>Il Mio Profilo</h2>

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


    {if $user}
        <div class="profile-details card">
            <div class="card-body">
                <h3 class="card-title">Dettagli Personali</h3>
                <form action="{$base_url}user/process_profile_update.php" method="POST">
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
                        <label for="birthDate">Data di Nascita:</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$user->getBirthDate()|default:''}" required>
                    </div>
                    <div class="form-group">
                        <label for="birthPlace">Luogo di Nascita:</label>
                        <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$user->getBirthPlace()|default:''}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Aggiorna Profilo</button>
                </form>
                
                <h3 class="card-title mt-5">Modifica Password</h3>
                <form action="{$base_url}user/process_password_change.php" method="POST">
                    <div class="form-group">
                        <label for="currentPassword">Password Attuale:</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Nuova Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword">Conferma Nuova Password:</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Cambia Password</button>
                </form>
            </div>
        </div>
    {else}
        <div class="alert alert-warning" role="alert">
            Impossibile caricare i dati del profilo. Assicurati di essere loggato.
        </div>
    {/if}
</section>

{include file='footer.tpl'}

{* Aggiungi questi stili al tuo public/css/style.css *}
<style>
    .profile-details.card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        padding: 30px;
    }
    .profile-details .card-title {
        font-size: 1.5rem;
        margin-bottom: 25px;
        color: #007bff;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }
    .profile-details .form-group {
        margin-bottom: 20px;
    }
    .profile-details label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
    .profile-details .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }
</style>