<!DOCTYPE html>
<html>
<head>
    <title>Errore Pagamento</title>
</head>
<body>
    <h1>Errore durante il Pagamento</h1>
    <p>Si è verificato un problema. <?php echo htmlspecialchars($_GET['msg'] ?? 'Riprova più tardi.'); ?></p>
    <p>Torna alla <a href="/MioProgettoHotel/checkout.html">pagina di pagamento</a>.</p>
</body>
</html>