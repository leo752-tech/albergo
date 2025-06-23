{include file='header.tpl'}

    <section>
        <div>
            <div>
                <h3 class="card-title mt-5">Modifica Password</h3>
                <form action="albergoPulito/public/User/updatePassword" method="POST">
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
    </section>

{include file='footer.tpl'}