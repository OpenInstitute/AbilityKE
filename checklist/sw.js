// Caching to prevent online dinausers or whatever the chrome things are
importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.4.1/workbox-sw.js");

importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.4.1/workbox-sw.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');

workbox.setConfig({
  debug: false
});

var browser = navigator.userAgent.toLowerCase();
if (browser.indexOf('firefox') === -1) {

// Precaching.
  let precacheAssets = self.__precacheManifest || [];
  precacheAssets = precacheAssets.concat([
    '/offline.html',
    '/assets/images/icons/ability-favi.png',
    '/index.php',
    '/form.php ',
  ]);
  workbox.precaching.precacheAndRoute(precacheAssets);

  // CSS / JS.
  workbox.routing.registerRoute(
    /\.(?:js|css)$/,
    workbox.strategies.staleWhileRevalidate()
  );

  // Static images.
  workbox.routing.registerRoute(
    new RegExp('^/img/.*(?:png|gif|jpg|jpeg|svg)'),
    workbox.strategies.cacheFirst({
      cacheName: 'images',
      plugins: [
        new workbox.expiration.Plugin({
          maxEntries: 60,
          maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
        }),
      ],
    }),
  );

  // Network only.
  // workbox.routing.registerRoute('/login-authorization.json', workbox.strategies.networkOnly());
  // workbox.routing.registerRoute(new RegExp('/subscriber/'), workbox.strategies.networkOnly());
  // workbox.routing.registerRoute(new RegExp('/article-comments'), workbox.strategies.networkOnly());
  // workbox.routing.registerRoute(new RegExp('/independent-minds-bookmarks'), workbox.strategies.networkOnly());
  // workbox.routing.registerRoute(new RegExp('/internal-api/'), workbox.strategies.networkOnly());
  // workbox.routing.registerRoute(new RegExp('/tracking/'), workbox.strategies.networkOnly());

  // External resources.
  // workbox.routing.registerRoute(
  //   new RegExp('https://(?:cdn.ampproject.org|native.sharethrough.com|cdns.gigya.com)/(.*)'),
  //   workbox.strategies.staleWhileRevalidate()
  // );

  // Everything else - go to the network and fallback to offline page.
  workbox.routing.registerRoute(new RegExp('/(.*)'), (args) => {
    return workbox.strategies.networkFirst().handle(args)
      .then(response => {
        if (!response) {
          return caches.match(new Request('/offline.html'));
        }
        return response;
      });
  });

  // Push notifications.
  firebase.initializeApp({
    messagingSenderId: '809627450745'
  });
  firebase.messaging();

  // Offline analytics.
  workbox.googleAnalytics.initialize();
}

