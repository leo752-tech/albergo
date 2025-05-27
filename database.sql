# Creazione del Database
CREATE DATABASE IF NOT EXISTS my_database_prova;
USE my_database_prova;

/*
 * Tabella: utenti
 * Rappresenta gli utenti del sistema che sono registrati e effettuano prenotazioni
 */
CREATE TABLE IF NOT EXISTS utenti_registrati (
    idUtente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    dataN DATE NOT NULL,
    comuneN VARCHAR(100) NOT NULL
    mail VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, # Conserva l'hash della password. Assicurati che la tua Entity salvi un hash.
    idPrenotazioni VARCHAR(255) # formato json che conserva uun array dove ogni elemento corrisponde all'id di una prenotazione effettuata
    idRecensioni VARCHAR(255) # formato json che conserva uun array dove ogni elemento corrisponde all'id di una recensione effettuata   
);

/*
 * Tabella: utenti
 * Rappresenta gli utenti del sistema che soggiornano nella struttura
 */
CREATE TABLE IF NOT EXISTS utenti (
    idUtente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    dataN DATE NOT NULL,
    comuneN VARCHAR(100) NOT NULL
);

/*
 * Tabella: camere
 * Rappresenta le camere disponibili nell'hotel
 */
CREATE TABLE IF NOT EXISTS camere (
    idCamera INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    posti INT NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    tipo VARCHAR(50) NOT NULL # Es: 'Singola', 'Doppia', 'Suite'
    idOccupazioni TEXT, # formato json che memorizza gli id di tutti i periodi durante i quali la camera è occupata
    idPrenotazioni TEXT # formato json che memorizza gli id di tutte le prenotazioni effettuate su quella camera 
);

/*
 * Tabella: servizi_extra
 * Rappresenta i servizi aggiuntivi che possono essere prenotati
 */
CREATE TABLE IF NOT EXISTS servizi_extra (
    id_servizio INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    descrizione TEXT,
    prezzo DECIMAL(10, 2) NOT NULL
    idPrenotazione INT #------------------DA VEDERE-----------------

);

/*
 * Tabella: prenotazioni
 * Rappresenta le prenotazioni effettuate dai clienti
 */
CREATE TABLE IF NOT EXISTS prenotazioni (
    idPrenotazione INT PRIMARY KEY AUTO_INCREMENT,
    idUtente INT NOT NULL, # Utente che ha effettuato la prenotazione
    idUtenti VARCHAR(255), # Utenti ospiti che soggiornano nella camera
    idCamera INT NOT NULL,
    idPeriodo INT NOT NULL,
    idServizioExtra INT NULL, # Può essere NULL se nessun servizio extra è stato scelto
    prezzo DECIMAL(10, 2) NOT NULL, #------------------DA VEDERE----------------------
    dataPrenotazione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cancellata BOOLEAN DEFAULT FALSE,
    
    FOREIGN KEY (idUtente) REFERENCES utenti_registrati(idUtente) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (idCamera) REFERENCES camere(idCamera) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (idServizioExtra) REFERENCES servizi_extra(idServizioExtra) ON DELETE SET NULL ON UPDATE CASCADE
);

/*
 * Tabella di Join: prenotazioni_utenti
 * Gestisce la relazione tra prenotazioni e utenti (gli ospiti aggiuntivi)
 */
CREATE TABLE IF NOT EXISTS prenotazioni_utenti (
    idPrenotazione INT NOT NULL,
    idUtente INT NOT NULL, # ID dell'utente che ha effettuato la prenotazione  -----------DA VEDERE------------------
    PRIMARY KEY (idPrenotazione, idUtente), # Chiave primaria composta
    
    FOREIGN KEY (idPrenotazione) REFERENCES prenotazioni(idPrenotazione) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idUtente) REFERENCES utenti_registrati(idUtente) ON DELETE CASCADE ON UPDATE CASCADE
);

/*
 * Tabella: recensioni
 * Rappresenta le recensioni scritte dagli utenti
 */
CREATE TABLE IF NOT EXISTS recensioni (
    idRecensione INT PRIMARY KEY AUTO_INCREMENT,
    idUtente INT NOT NULL, # Utente che ha scritto la recensione
    titolo VARCHAR(255),
    valutazione INT NOT NULL, # Es: da 1 a 5
    descrizione TEXT,
    dataRecensione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (idUtente) REFERENCES utenti_registrati(idUtente) ON DELETE CASCADE ON UPDATE CASCADE
);

/*
 * Tabella: periodi
 * Rappresenta i periodi di tutte le prenotazioni
*/
CREATE TABLE IF NOT EXISTS periodi (
    idPeriodo INT PRIMARY KEY AUTO_INCREMENT,
    inizio DATE NOT NULL,
    fine DATE NOT NULL,
    lunghezza INT NOT NULL,
    tipo VARCHAR(255),
    idPrenotazione #---------------DA VEDERE-------------------------------- 
)
