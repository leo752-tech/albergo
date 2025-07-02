const CACHE_NAME = 'my-pwa-cache-v1'; // Nome della cache, incrementalo ad ogni aggiornamento
const urlsToCache = [
  '/', // La tua pagina principale
  'https://provahotelprova.altervista.org',
  '/albergoPulito/public/assets/css/script.css', // I tuoi file CSS
  '/albergoPulito/public/assets/js/script.js',  // I tuoi file JavaScript
  '/albergoPulito/public/manifest.json',
  '/albergoPulito/public/assets/img/iconHotel.png', // Le tue icone
  '/albergoPulito/public/assets/img/iconHotel.png'
  // Aggiungi qui tutti gli asset statici che vuoi che funzionino offline
];

// Install event: cache le risorse al primo caricamento della PWA
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch event: intercetta le richieste di rete e serve dalla cache se disponibile
self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request)
      .then((response) => {
        // Cache hit - restituisci la risposta della cache
        if (response) {
          return response;
        }
        // Nessun hit nella cache - recupera dalla rete
        return fetch(event.request);
      })
  );
});

// Activate event: pulisce le vecchie cache
self.addEventListener('activate', (event) => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            // Elimina le cache che non sono nella whitelist
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});