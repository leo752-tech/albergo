<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Amministrazione - Hotel Reservation</title>
    <link rel="stylesheet" href="/hotel_reservation/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="admin-login-page">
    <div class="login-container">
        <h2>Login Amministrazione</h2>
        {if isset($errorMessage)}
            <div class="alert alert-danger">{$errorMessage}</div>
        {/if}
        <form action="/hotel_reservation/admin/login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Nome Utente:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Accedi</button>
        </form>
    </div>
</body>
</html>