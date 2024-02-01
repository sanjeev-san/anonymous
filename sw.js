self.addEventListener("install", e =>{    
    e.waitUntil(
        caches.open("pwa-assets")
        .then(cache => {
           return cache.addAll(["error.php"]);
        })
     )
})
self.addEventListener("fetch", event => {
   event.respondWith(
     fetch(event.request)
     .catch(error => {
       return caches.match("error.php") ;
     })
   );
});
self.addEventListener('message', (event) => {
    if (event.data === 'SKIP_WAITING') {
        self.skipWaiting();
    }
});