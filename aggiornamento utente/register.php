<?php


require_once __DIR__ . '/includes/SmartyConfig.php';
require_once __DIR__ . '/classes/utility/USession.php';
require_once __DIR__ . '/classes/utility/UAuth.php'; 
USession::getInstance();

$smarty = getSmarty();

$pageTitle = "Registrazione Utente - Nome Hotel";
$smarty->assign('pageTitle', $pageTitle);

// Recupera messaggi di successo/errore e dati del form dalla sessione
$registrationError = USession::getSessionElement('registration_error');
USession::unsetSessionElement('registration_error');

$registrationSuccess = USession::getSessionElement('registration_success');
USession::unsetSessionElement('registration_success');

$formData = USession::getSessionElement('form_data');
USession::unsetSessionElement('form_data');

$smarty->assign('errorMessage', $registrationError); 
$smarty->assign('successMessage', $registrationSuccess);
$smarty->assign('formData', $formData);

// Imposta lo stato di login per il menu (per l'header generale)
$smarty->assign('isLoggedIn', UAuth::isLoggedIn());
if (UAuth::isLoggedIn()) {
    $smarty->assign('loggedInUser', USession::getSessionElement('user_data'));
}

$smarty->display('register.tpl');
?>