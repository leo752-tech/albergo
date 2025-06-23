<?php


require_once __DIR__ . '/../includes/SmartyConfig.php';
require_once __DIR__ . '/../classes/utility/USession.php';
require_once __DIR__ . '/../classes/foundation/FRegisteredUser.php'; 

USession::getInstance();
$smarty = getSmarty();

$userId = $_GET['id'] ?? null; // Recupera l'ID utente dall'URL

$user = null;
if ($userId) {
    // Carica l'utente dal database
    // Assumi che FRegisteredUser::getObjectById() esista e restituisca ERegisteredUser
    $user = FRegisteredUser::getObjectById($userId); 
}

if (!$user) {
    USession::setSessionElement('error_message', 'Utente non trovato.');
    header('Location: ' . $smarty->getTemplateVars('base_url') . 'admin/users.php');
    exit();
}

$errorMessage = USession::getSessionElement('error_message');
USession::unsetSessionElement('error_message');
$successMessage = USession::getSessionElement('success_message');
USession::unsetSessionElement('success_message');

$smarty->assign('errorMessage', $errorMessage);
$smarty->assign('successMessage', $successMessage);
$smarty->assign('user', $user); // Assegna l'oggetto utente al template

$smarty->display('admin/edit_user.tpl');
?>