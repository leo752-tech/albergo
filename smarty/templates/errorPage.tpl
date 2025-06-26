<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .error-container {
            background-color: #fff;
            border: 1px solid #dc3545; /* Colore rosso per il bordo */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        .error-icon {
            color: #dc3545;
            font-size: 50px;
            margin-bottom: 20px;
        }
        h1 {
            color: #dc3545; /* Rosso per il titolo */
            margin-bottom: 15px;
        }
        p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .back-button {
            background-color: #007bff; /* Blu per il pulsante */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">&#x2716;</div> <h1>Si è verificato un errore!</h1>
        <p>{$error_message}</p>
        <a href="/albergoPulito/public/Admin/manageUsers" class="back-button">Torna alla gestione utenti</a>
    </div>
</body>
</html>