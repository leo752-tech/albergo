<?php


require_once __DIR__ . '/includes/SmartyConfig.php';
require_once __DIR__ . '/classes/utility/USession.php';
require_once __DIR__ . '/classes/utility/UAuth.php'; 

USession::getInstance();

$smarty = getSmarty();

$pageTitle = "Accedi o Registrati - Nome Hotel";
$smarty->assign('pageTitle', $pageTitle);

// Recupera messaggi di errore/successo dalla sessione dopo un tentativo di login fallito
$errorMessage = USession::getSessionElement('error_message');
USession::unsetSessionElement('error_message');

$successMessage = USession::getSessionElement('success_message');
USession::unsetSessionElement('success_message');

$formData = USession::getSessionElement('form_data'); // Per ripopolare il form di registrazione se fallisce
USession::unsetSessionElement('form_data');

$smarty->assign('errorMessage', $errorMessage);
$smarty->assign('successMessage', $successMessage);
$smarty->assign('formData', $formData); // Per il form di registrazione sulla stessa pagina

// Imposta lo stato di login per il menu (per l'header generale)
$smarty->assign('isLoggedIn', UAuth::isLoggedIn());
if (UAuth::isLoggedIn()) {
    $smarty->assign('loggedInUser', USession::getSessionElement('user_data'));
}


$smarty->display('login.tpl'); 
?>