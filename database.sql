-- Creazione del Database (se non esiste già)
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `hotel_db`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente` (Ospiti / Persone)
-- Rappresenta qualsiasi persona, sia essa registrata o solo un ospite.
--
CREATE TABLE `Utente` (
  `idUtente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cognome` VARCHAR(100) NOT NULL,
  `dataNascita` DATE NOT NULL,
  `comuneNascita` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUtente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `UtenteRegistrato` (Account utente)
-- Rappresenta un account con credenziali di accesso, collegato a una persona in `Utente`.
--
CREATE TABLE `UtenteRegistrato` (
  `idUtenteRegistrato` INT(11) NOT NULL AUTO_INCREMENT,
  `idUtente` INT(11) NOT NULL, -- FK a Utente.idUtente
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, -- Per la password hashata
  `ruolo` VARCHAR(50) DEFAULT 'cliente', -- Es. 'cliente', 'admin' (opzionale)
  PRIMARY KEY (`idUtenteRegistrato`),
  UNIQUE KEY `idx_unique_idUtente` (`idUtente`), -- Assicura 1 account per persona
  CONSTRAINT `fk_utente_registrato_utente` FOREIGN KEY (`idUtente`) REFERENCES `Utente` (`idUtente`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Camera`
--
CREATE TABLE `Camera` (
  `idCamera` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL UNIQUE,
  `posti` INT(11) NOT NULL,
  `prezzoNotte` DECIMAL(10, 2) NOT NULL, -- Prezzo per una notte
  `tipo` VARCHAR(50) NOT NULL, -- Es. 'Singola', 'Doppia', 'Suite'
  PRIMARY KEY (`idCamera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Prenotazione`
--
CREATE TABLE `Prenotazione` (
  `idPrenotazione` INT(11) NOT NULL AUTO_INCREMENT,
  `idUtenteRegistrato` INT(11) NOT NULL, -- FK all'utente che ha effettuato la prenotazione
  `idCamera` INT(11) NOT NULL,           -- FK alla camera prenotata
  `dataCheckIn` DATE NOT NULL,
  `dataCheckOut` DATE NOT NULL,
  `prezzoTotale` DECIMAL(10, 2) NOT NULL,
  `dataPrenotazione` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Timestamp della creazione della prenotazione
  `cancellata` BOOLEAN NOT NULL DEFAULT FALSE, -- Flag per il soft delete
  PRIMARY KEY (`idPrenotazione`),
  CONSTRAINT `fk_prenotazione_utente_registrato` FOREIGN KEY (`idUtenteRegistrato`) REFERENCES `UtenteRegistrato` (`idUtenteRegistrato`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_prenotazione_camera` FOREIGN KEY (`idCamera`) REFERENCES `Camera` (`idCamera`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ServizioExtra`
--
CREATE TABLE `ServizioExtra` (
  `idServizioExtra` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL UNIQUE,
  `descrizione` TEXT,
  `prezzo` DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (`idServizioExtra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella di collegamento `Prenotazione_ServizioExtra`
-- Relazione Molti-a-Molti tra Prenotazione e ServizioExtra.
--
CREATE TABLE `Prenotazione_ServizioExtra` (
  `idPrenotazione` INT(11) NOT NULL,
  `idServizioExtra` INT(11) NOT NULL,
  `quantita` INT(11) NOT NULL DEFAULT 1, -- Quantità del servizio extra (es. 2 colazioni)
  PRIMARY KEY (`idPrenotazione`, `idServizioExtra`), -- Chiave composta
  CONSTRAINT `fk_ps_prenotazione` FOREIGN KEY (`idPrenotazione`) REFERENCES `Prenotazione` (`idPrenotazione`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ps_servizio_extra` FOREIGN KEY (`idServizioExtra`) REFERENCES `ServizioExtra` (`idServizioExtra`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Recensione`
--
CREATE TABLE `Recensione` (
  `idRecensione` INT(11) NOT NULL AUTO_INCREMENT,
  `idUtenteRegistrato` INT(11) NOT NULL, -- FK all'utente registrato che ha lasciato la recensione
  `titolo` VARCHAR(255) NOT NULL,
  `valutazione` INT(11) NOT NULL CHECK (`valutazione` >= 1 AND `valutazione` <= 5), -- Es. da 1 a 5 stelle
  `descrizione` TEXT,
  `dataRecensione` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRecensione`),
  CONSTRAINT `fk_recensione_utente_registrato` FOREIGN KEY (`idUtenteRegistrato`) REFERENCES `UtenteRegistrato` (`idUtenteRegistrato`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella di collegamento `Prenotazione_OspiteAggiuntivo`
-- Relazione Molti-a-Molti tra una Prenotazione e gli Utenti che sono ospiti aggiuntivi.
-- (Non è necessariamente l'UtenteRegistrato che ha fatto la prenotazione)
--
CREATE TABLE `Prenotazione_OspiteAggiuntivo` (
  `idPrenotazione` INT(11) NOT NULL,
  `idUtente` INT(11) NOT NULL, -- FK all'Utente (persona) che è ospite aggiuntivo
  PRIMARY KEY (`idPrenotazione`, `idUtente`), -- Chiave composta
  CONSTRAINT `fk_po_prenotazione` FOREIGN KEY (`idPrenotazione`) REFERENCES `Prenotazione` (`idPrenotazione`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_po_utente` FOREIGN KEY (`idUtente`) REFERENCES `Utente` (`idUtente`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
