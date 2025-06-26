document.addEventListener('DOMContentLoaded', function() {
    // Ho cambiato l'ID dell'input file per riflettere il singolo file
    const fileInput = document.getElementById('room_image'); // Assicurati che l'ID dell'input HTML sia 'room_image'
    const previewContainer = document.getElementById('image_preview_container');

    // Usiamo un oggetto DataTransfer per gestire i file selezionati dall'utente.
    // Questo ci permette di aggiungere e rimuovere file dinamicamente prima dell'invio.
    let filesToUpload = new DataTransfer();

    // Listener per il cambio nell'input dei file.
    fileInput.addEventListener('change', function() {
        // --- MODIFICA CRUCIALE QUI ---
        // Seleziona un solo file: svuota l'array e aggiungi solo il nuovo file
        filesToUpload = new DataTransfer(); // Resetta l'oggetto DataTransfer

        // Assicurati che ci sia un file selezionato
        if (this.files.length > 0) {
            const file = this.files[0]; // Prendi solo il primo file selezionato
            filesToUpload.items.add(file);
        }
        // --- FINE MODIFICA ---

        // Aggiorna l'attributo 'files' dell'input, così il form invierà la lista corretta.
        this.files = filesToUpload.files;
        renderPreviews(); // Ridisegna le anteprime.
    });

    /**
     * Funzione per renderizzare tutte le anteprime delle immagini selezionate.
     * Svuota il contenitore e ricrea tutte le anteprime.
     */
    function renderPreviews() {
        previewContainer.innerHTML = ''; // Pulisce il contenitore delle anteprime.

        if (filesToUpload.files.length === 0) {
            // Mostra un messaggio se non ci sono immagini selezionate.
            previewContainer.innerHTML = '<p class="text-muted text-center" style="grid-column: 1 / -1;">Nessuna immagine selezionata.</p>';
            return;
        }

        // Itera su tutti i file nell'oggetto DataTransfer.
        // Anche se ci sarà un solo file qui, la logica del ciclo rimane valida.
        for (let i = 0; i < filesToUpload.files.length; i++) {
            const file = filesToUpload.files[i];
            const reader = new FileReader(); // Crea un FileReader per leggere il file.

            // Quando il file è stato letto, carica l'anteprima.
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.classList.add('image-preview-item');
                // Salva l'indice del file come attributo data- per facilitare la rimozione.
                previewItem.dataset.index = i;

                // Inserisce l'immagine e il pulsante di rimozione nell'elemento di anteprima.
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Anteprima immagine">
                    <button type="button" class="remove-image" data-index="${i}">&times;</button>
                `;
                previewContainer.appendChild(previewItem); // Aggiunge l'anteprima al contenitore.

                // Aggiunge un listener al bottone di rimozione.
                previewItem.querySelector('.remove-image').addEventListener('click', function() {
                    const indexToRemove = parseInt(this.dataset.index);
                    removeFile(indexToRemove); // Chiama la funzione per rimuovere il file.
                });
            };
            reader.readAsDataURL(file); // Legge il file come URL di dati per l'anteprima.
        }
    }

    /**
     * Funzione per rimuovere un file dalla lista di quelli da caricare.
     * Ricrea l'oggetto DataTransfer escludendo il file specificato dall'indice.
     * @param {number} indexToRemove L'indice del file da rimuovere.
     */
    function removeFile(indexToRemove) {
        const newFilesToUpload = new DataTransfer(); // Nuovo oggetto DataTransfer.

        // Copia tutti i file tranne quello da rimuovere.
        for (let i = 0; i < filesToUpload.files.length; i++) {
            if (i !== indexToRemove) {
                newFilesToUpload.items.add(filesToUpload.files[i]);
            }
        }
        filesToUpload = newFilesToUpload; // Sostituisce la vecchia lista con la nuova.

        // Aggiorna l'input file con la lista modificata.
        fileInput.files = filesToUpload.files;

        renderPreviews(); // Ridisegna le anteprime per riflettere la rimozione.
    }

    // Al caricamento iniziale della pagina, renderizza le anteprime (mostra il messaggio "Nessuna immagine selezionata").
    // Se ci fossero immagini preesistenti da un caricamento precedente o dal server (es. in modifica),
    // questa logica dovrebbe essere estesa per gestirle.
    renderPreviews();
});