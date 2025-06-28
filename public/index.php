<?php
require_once(__DIR__ . '/../app/utility/autoloader.php');
require_once(__DIR__ . '/../app/config/config.php');
require_once(__DIR__ . '/../app/installation/StartSmarty.php');

// Controllo esistenza DB
try {
    $pdo = new PDO('mysql:host=' . DB_HOST, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verifica se il database esiste
    $stmt = $pdo->query("SHOW DATABASES LIKE '" . DB_NAME . "'");
    if ($stmt->rowCount() === 0) {
        header('Location: /albergoPulito/Install/installation.php');
        exit();
    }
} catch (PDOException $e) {
// Connessione al database fallita
    header('Location: /albergoPulito/Install/installation.php');
    exit();
}

// Se tutto è ok, esegue il controller
$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);
