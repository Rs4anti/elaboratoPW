# Cinema Management Website

Questa repository contiene il codice sorgente per la realizzazione di un sito web dedicato alla gestione di due cinema. Il sito web attuale è disponibile all'indirizzo [multisalegarden-iride.it](https://www.multisalegarden-iride.it/).

## Tecnologie Utilizzate

- **Framework**: Laravel 11
- **Composer**: Versione 2.7.2 (2024-03-11 17:12:18)
- **PHP**: Versione 8.2.18
- **Lato Client**: JavaScript per la paginazione dei contenuti
- **Chiamate AJAX**: Per interagire con i contenuti già presenti nel database sul server
- **Database**: MySql

## Descrizione del Progetto

Il sito web è stato progettato per facilitare la gestione e la visualizzazione di informazioni relative ai due cinema, comprese le proiezioni dei film, la prenotazione dei biglietti e la gestione degli utenti. Il progetto sfrutta le potenzialità del framework Laravel per il backend, garantendo una solida struttura MVC e una gestione efficiente dei dati.

### Funzionalità Principali

- **Gestione Cinema**: Permette di gestire le informazioni relative ai due cinema, incluse le sale, gli orari delle proiezioni e i film in programmazione.
- **Paginazione Dinamica**: Implementata con JavaScript per un'esperienza utente fluida e reattiva.
- **Interazione AJAX**: Utilizzata per aggiornare e recuperare dinamicamente i dati dal database senza dover ricaricare la pagina, migliorando così l'efficienza e la velocità del sito.

### Installazione

Per installare e configurare il progetto, segui questi passaggi:

1. Clona la repository:
   ```bash
   git clone https://github.com/Rs4anti/elaboratoPW

2. Naviga nella directory del progetto:
    ```bash
    cd elaboratoPW

3. Installa le dipendenze con Composer:
    ```bash
    composer update

4. Configura il file .env con le impostazioni del database e altre configurazioni necessarie

5. Esegui le migrazioni del database:
    ```bash
    php artisan migrate

6. Esegui il seed del database:
     ```bash
    php artisan db:seed

7. Avvia il server locale:
    ```bash
   php artisan serve


## Contribuire
Se desideri contribuire al progetto, sentiti libero di fare un fork della repository, creare un nuovo branch per le tue modifiche e inviare una pull request. Sarò felice di esaminare e integrare i miglioramenti.



