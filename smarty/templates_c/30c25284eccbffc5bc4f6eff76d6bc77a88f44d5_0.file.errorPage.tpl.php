<?php
/* Smarty version 4.3.2, created on 2025-06-27 23:20:42
  from 'C:\xampp\htdocs\albergoPulito\smarty\templates\errorPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_685f0b2ab701f6_46058933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30c25284eccbffc5bc4f6eff76d6bc77a88f44d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\albergoPulito\\smarty\\templates\\errorPage.tpl',
      1 => 1751059184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_685f0b2ab701f6_46058933 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo '<?php'; ?>
 echo $pageTitle ?? 'Nome Hotel - Il Tuo Soggiorno Perfetto'; <?php echo '?>'; ?>
</title>
    <link rel="stylesheet" href="/albergoPulito/public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/albergoPulito/public/"><h1>Nome Hotel</h1></a>
            </div>
            <nav class="desktop-nav">
                <ul>
                    <li><a href="/albergoPulito/public/">Home</a></li>
                    <li><a href="/albergoPulito/public/User/showAllRooms">Camere</a></li>
                    <li><a href="albergoPulito/public/User/showService">Servizi</a></li>
                    <li><a href="/albergoPulito/public/Booking/selectDate">Prenota Ora</a></li>
                    <li><a href="/albergoPulito/public/User/showAllReviews">Recensioni</a></li>
                    <li><a href="/albergoPulito/public/Booking/showSpecialOffer">Offerte Speciali</a></li>
                </ul>
            </nav>
            <button class="user-menu-toggle" id="userMenuToggle">
                <i class="fas fa-user-circle"></i>
            </button>
            <button class="mobile-menu-toggle" id="mobileMenuHamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div id="mobile-nav-menu" class="mobile-nav-menu">
            <ul>
                <li><a href="/albergoPulito/public/">Home</a></li>
                <li><a href="/albergoPulito/public/User/showAllRooms">Camere</a></li>
                <li><a href="/albergoPulito/public/User/showService">Servizi</a></li>
                <li><a href="/albergoPulito/public/Booking/selectDate">Prenota Ora</a></li>
                <li><a href="albergoPulito/public/User/showAllReviews">Recensioni</a></li>
                <li><a href="/albergoPulito/public/Booking/showSpecialOffer">Offerte Speciali</a></li>
            </ul>
        </div>
        <div id="user-actions-menu" class="user-actions-menu">
            <ul>
                <?php if ($_smarty_tpl->tpl_vars['is_logged_in']->value) {?>
                                        <li>
                        <a href="/albergoPulito/public/User/showAccountDetails" class="user-action-item">
                            <i class="fas fa-user"></i> <span>Visualizza Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="/albergoPulito/public/User/logout" class="user-action-item">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </a>
                    </li>
                <?php } else { ?>
                                        <li>
                        <a href="/albergoPulito/public/User/showLoginForm" class="user-action-item">
                            <i class="fas fa-sign-in-alt"></i> <span>Accedi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/albergoPulito/public/User/showFormsRegistration" class="user-action-item">
                            <i class="fas fa-user-plus"></i> <span>Registrati</span>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </header>

    <main class="container mt-4 main-error-section"> 
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Errore!</h4>
        <?php if ((isset($_smarty_tpl->tpl_vars['errorMessage']->value)) && !empty($_smarty_tpl->tpl_vars['errorMessage']->value)) {?>
            <p><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</p>
        <?php } else { ?>
            <p>Si è verificato un errore sconosciuto. Ti preghiamo di riprovare più tardi.</p>
        <?php }?>
        <hr>
        <p class="mb-0">Se il problema persiste, contatta il supporto tecnico.</p>
    </div>
    </main>
    <div class="text-center">
        <a href="javascript:history.back()" class="btn btn-primary">Torna indietro</a>
    </div>
    
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>     <?php }
}
