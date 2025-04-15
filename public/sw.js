const filesToCache = [
    '/',
    '/offline.html',
    '/manifest.json',
    '/logo.png' // if available locally
];

const preLoad = function () {
    return caches.open("offline").then(function (cache) {
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const checkResponse = function (request) {
    return fetch(request).then(function (response) {
        if (response.status !== 404) {
            return response;
        } else {
            throw new Error('Not found');
        }
    });
};

const addToCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        });
    });
};

const returnFromCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return cache.match(request).then(function (matching) {
            return matching || cache.match("/offline.html");
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(
        checkResponse(event.request).catch(() => returnFromCache(event.request))
    );
    if (event.request.url.startsWith('http')) {
        event.waitUntil(addToCache(event.request));
    }
});
