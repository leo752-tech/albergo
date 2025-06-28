{include file='header.tpl' pageTitle='login'}
    
<section id="auth-forms" class="container section-padding">
    <h2>Accedi al Tuo Account</h2>
    <form action="/albergoPulito/public/User/login" method="POST" class="auth-form">
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

    

</main>
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section about">
                        <h3>Nome Hotel</h3>
                        <p>Benvenuti nel vostro rifugio di lusso. Offriamo il massimo comfort e servizi impeccabili per rendere il vostro soggiorno indimenticabile.</p>
                    </div>
                    <div class="footer-section links">
                        <h3>Link Utili</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="camere.php">Camere</a></li>
                            <li><a href="servizi.php">Servizi</a></li>
                            <li><a href="prenota.php">Prenota Ora</a></li>
                            <li><a href="recensioni.php">Recensioni</a></li>
                            <li><a href="contatti.php">Contatti</a></li>
                        </ul>
                    </div>
                    <div class="footer-section contact">
                        <h3>Contatti</h3>
                        <p><i class="fa fa-map-marker"></i> Coppito, L'Aquila Italia</p>
                        <p><i class="fa fa-phone"></i> +39 3423453456</p>
                        <p><i class="fa fa-envelope"></i> info@nomehotel.it</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    © 2025 Nome Hotel. Tutti i diritti riservati.
                </div>
            </div>
        </footer>
        <script src="/~momok/assets/js/script.js"></script>
        </body>
</html>