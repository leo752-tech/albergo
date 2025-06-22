// Nella pagina di dettaglio (dettaglio_giorno.tpl o HTML)
document.addEventListener('DOMContentLoaded', () => {
    // Non abbiamo più un parametro 'date' nell'URLSearchParams.
    // Dobbiamo estrarre la data direttamente dal path dell'URL.
    
    // Ottiene il path completo (es. /albergoPulito/public/Admin/showBookingDetail/2025-06-23)
    const fullPath = window.location.pathname; 
    
    // Divide il path in segmenti e prende l'ultimo segmento che dovrebbe essere la data
    // Supponendo che la data sia sempre l'ultimo segmento dopo showBookingDetail/
    const pathSegments = fullPath.split('/');
    const dateString = pathSegments[pathSegments.length - 1]; // Questo sarà '2025-06-23'

    const pageTitle = document.getElementById('pageTitle');
    // ... il resto del tuo codice JavaScript ...

    if (dateString) {
        // ... (la logica esistente per elaborare dateString rimane la stessa) ...
        const [year, month, day] = dateString.split('-').map(Number);
        const dateObj = new Date(year, month - 1, day); 

        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const readableDate = dateObj.toLocaleDateString('it-IT', options);

        pageTitle.textContent = `Dettagli per il ${readableDate}`;

    } else {
        pageTitle.textContent = "Nessuna data trovata nell'URL.";
        document.getElementById('dayDetails').innerHTML = "<p>Impossibile recuperare la data dai dettagli dell'URL.</p>";
    }
});