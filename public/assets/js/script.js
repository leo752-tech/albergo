document.addEventListener('DOMContentLoaded', function() {
    // Seleziona gli elementi per il menu utente
    const userMenuToggle = document.getElementById('userMenuToggle');
    const userActionsMenu = document.getElementById('user-actions-menu');

    // Seleziona gli elementi per il menu di navigazione mobile (hamburger)
    const mobileMenuHamburger = document.getElementById('mobileMenuHamburger'); // Nuovo ID per il bottone
    const mobileNavMenu = document.getElementById('mobile-nav-menu');

    // Listener per il bottone del menu utente
    if (userMenuToggle && userActionsMenu) {
        userMenuToggle.addEventListener('click', function(event) {
            event.stopPropagation(); // Impedisce la propagazione del click
            userActionsMenu.classList.toggle('active');

            // Chiudi l'altro menu (mobileNavMenu) se è aperto, per evitare sovrapposizioni
            if (mobileNavMenu && mobileNavMenu.classList.contains('active')) {
                mobileNavMenu.classList.remove('active');
            }
        });
    }

    // Listener per il bottone del menu di navigazione mobile (hamburger)
    if (mobileMenuHamburger && mobileNavMenu) {
        mobileMenuHamburger.addEventListener('click', function(event) {
            event.stopPropagation(); // Impedisce la propagazione del click
            mobileNavMenu.classList.toggle('active');

            // Chiudi l'altro menu (userActionsMenu) se è aperto
            if (userActionsMenu && userActionsMenu.classList.contains('active')) {
                userActionsMenu.classList.remove('active');
            }
        });
    }

    // Listener globale per chiudere entrambi i menu quando si clicca fuori
    document.addEventListener('click', function(event) {
        // Chiudi il menu utente se è aperto e il click non è su di esso o sul suo toggle
        if (userActionsMenu && userActionsMenu.classList.contains('active') && !userActionsMenu.contains(event.target) && event.target !== userMenuToggle) {
            userActionsMenu.classList.remove('active');
        }

        // Chiudi il menu mobile se è aperto e il click non è su di esso o sul suo toggle
        if (mobileNavMenu && mobileNavMenu.classList.contains('active') && !mobileNavMenu.contains(event.target) && event.target !== mobileMenuHamburger) {
            mobileNavMenu.classList.remove('active');
        }
    });

    // Se hai un overlay e vuoi gestirlo, puoi riattivare il codice qui
    // const overlay = document.getElementById('overlay');
    // if (overlay) {
    //     overlay.addEventListener('click', function() {
    //         if (userActionsMenu && userActionsMenu.classList.contains('active')) {
    //             userActionsMenu.classList.remove('active');
    //         }
    //         if (mobileNavMenu && mobileNavMenu.classList.contains('active')) {
    //             mobileNavMenu.classList.remove('active');
    //         }
    //         overlay.classList.remove('active');
    //     });
    // }
    // Per un menu a discesa, l'overflow hidden sul body non è solitamente necessario.
    // document.body.style.overflow = '';
});