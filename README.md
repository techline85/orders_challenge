# OrdersChallenge

OrdersChallenge è un'applicazione Laravel che gestisce ordini e prodotti. Gli utenti possono creare ordini, visualizzare i prodotti e interagire con il sistema tramite un'API protetta da autenticazione.

## Requisiti

Per eseguire il progetto, assicurati di avere installato i seguenti strumenti:

- PHP 8.1 o superiore
- Composer
- MySQL o MariaDB
- Node.js e npm (per le dipendenze front-end, se necessario)

## Installazione

Segui questi passaggi per configurare il progetto localmente:

### 1. Clona il repository

Per prima cosa, clona il repository utilizzando Git:

```bash
git clone https://github.com/techline85/orders_challenge.git

```
### 2. Entra nella directory

```bash
cd orders_challenge

```

### 3. Installa le dipendenze

```bash
composer install

```

### 4. Crea il file .env

```bash
cp .env.example .env

```

### 5. Genera la chiave dell'app

```bash
php artisan key:generate

```
### 6. Esegui il seeder

```bash
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=UserSeeder

```

Utilizzo delle API

Le rotte delle API sono protette tramite autenticazione (Sanctum). Puoi creare un utente e ottenere un token per fare richieste autenticato.
Autenticazione

Per autenticarti, usa l'endpoint /api/auth per effettuare il login:

    POST /api/auth
        Parametri: email e password (deve essere presente un utente nel database).

Endpoint

    GET /api/products: Visualizza tutti i prodotti.
    GET /api/products/{id}: Visualizza un singolo prodotto.
    POST /api/orders: Crea un nuovo ordine.
    GET /api/orders/{id}: Visualizza un singolo ordine.
    GET /api/orders (solo admin): Visualizza la lista degli ordini.
    PUT /api/orders/{id} (solo admin): Modifica un ordine esistente.
    DELETE /api/orders/{id} (solo admin): Elimina un ordine esistente.

Reportistica API

Puoi anche ottenere i dati relativi agli ordini attraverso un endpoint dedicato:

    GET /api/reports: Restituisce il totale degli ordini effettuati, il totale dei prodotti venduti e il totale del ricavo.

Contribuire

Se desideri contribuire a questo progetto, crea una nuova branch per ogni feature o correzione. Dopo aver completato la tua modifica, crea una pull request.
Licenza

Questo progetto è concesso in licenza sotto la MIT License - vedi il file LICENSE per i dettagli.


### Spiegazione del contenuto:

1. **Introduzione**: Breve descrizione del progetto e del suo scopo.
2. **Requisiti**: Software necessario per eseguire il progetto.
3. **Installazione**: Guida passo-passo per scaricare, configurare e avviare l'applicazione Laravel.
4. **Utilizzo delle API**: Dettagli sugli endpoint disponibili, inclusi quelli per autenticarsi e interagire con i prodotti e gli ordini.
5. **Reportistica API**: Descrizione dell'endpoint per ottenere i dati sui report.
6. **Contribuire**: Linee guida per contribuire al progetto.
7. **Licenza**: Dettagli sulla licenza MIT che copre il progetto.

Salva questo contenuto come `README.md` nella root del tuo progetto.
