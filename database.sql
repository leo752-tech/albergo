# Creazione del Database
CREATE DATABASE IF NOT EXISTS my_database_prova;
USE my_database_prova;

/*
 * Tabella: utenti
 * Rappresenta gli utenti del sistema (clienti che prenotano, ospiti aggiuntivi)
 */
CREATE TABLE IF NOT EXISTS utenti (
    id_utente INT PRIMARY KEY AUTO_INCREMENT,
    mail VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, # Conserva l'hash della password. Assicurati che la tua Entity salvi un hash.
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    data_nascita DATE NOT NULL,
    comune_nascita VARCHAR(100) NOT NULL
);

/*
 * Tabella: camere
 * Rappresenta le camere disponibili nell'hotel
 */
CREATE TABLE IF NOT EXISTS camere (
    id_camera INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    posti INT NOT NULL,
    prezzo_notte DECIMAL(10, 2) NOT NULL,
    tipo VARCHAR(50) NOT NULL # Es: 'Singola', 'Doppia', 'Suite'
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
);

/*
 * Tabella: prenotazioni
 * Rappresenta le prenotazioni effettuate dai clienti
 */
CREATE TABLE IF NOT EXISTS prenotazioni (
    id_prenotazione INT PRIMARY KEY AUTO_INCREMENT,
    id_utente_prenotante INT NOT NULL, # Utente che ha effettuato la prenotazione
    id_camera INT NOT NULL,
    data_check_in DATE NOT NULL,
    data_check_out DATE NOT NULL,
    prezzo_totale DECIMAL(10, 2) NOT NULL,
    id_servizio_extra INT NULL, # Può essere NULL se nessun servizio extra è stato scelto
    data_prenotazione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cancellata BOOLEAN DEFAULT FALSE,
    
    FOREIGN KEY (id_utente_prenotante) REFERENCES utenti(id_utente) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_camera) REFERENCES camere(id_camera) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_servizio_extra) REFERENCES servizi_extra(id_servizio) ON DELETE SET NULL ON UPDATE CASCADE
);

/*
 * Tabella di Join: prenotazioni_utenti
 * Gestisce la relazione tra prenotazioni e utenti (gli ospiti aggiuntivi)
 */
CREATE TABLE IF NOT EXISTS prenotazioni_utenti (
    id_prenotazione INT NOT NULL,
    id_utente INT NOT NULL, # ID dell'ospite (può essere lo stesso del prenotante, ma qui rappresenta un ospite sulla prenotazione)
    PRIMARY KEY (id_prenotazione, id_utente), # Chiave primaria composta
    
    FOREIGN KEY (id_prenotazione) REFERENCES prenotazioni(id_prenotazione) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_utente) REFERENCES utenti(id_utente) ON DELETE CASCADE ON UPDATE CASCADE
);

/*
 * Tabella: recensioni
 * Rappresenta le recensioni scritte dagli utenti
 */
CREATE TABLE IF NOT EXISTS recensioni (
    id_recensione INT PRIMARY KEY AUTO_INCREMENT,
    id_utente INT NOT NULL, # Utente che ha scritto la recensione
    titolo VARCHAR(255),
    valutazione INT NOT NULL, # Es: da 1 a 5
    descrizione TEXT,
    data_recensione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_utente) REFERENCES utenti(id_utente) ON DELETE CASCADE ON UPDATE CASCADE
);