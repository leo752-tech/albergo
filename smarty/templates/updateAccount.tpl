{include file='header.tpl' pageTitle='update account'}
        
    <section id="user-profile" class="container section-padding">

        <div class="profile-details card">
            <div class="card-body">
                <h3 class="card-title">Dettagli Personali</h3>
                <form action="/albergoPulito/public/User/updateAccount" method="POST">
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
                        <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$user->getBirthDate()->format('d-m-Y')|default:''}" required>
                    </div>
                    <div class="form-group">
                        <label for="birthPlace">Luogo di Nascita:</label>
                        <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="{$user->getBirthPlace()|default:''}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Aggiorna Profilo</button>
                </form>
            </div>
        </div>
    </section>

{include file='footer.tpl'}
