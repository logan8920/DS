<!doctype html>
<html>
  <head>
    <meta charset="utf-" />
    <title>Loading…</title>
  </head>
  <body>
    <script src="[cdn.shopify.com/shopifycloud/app-bridge.js](https://cdn.shopify.com/shopifycloud/app-bridge.js)"></script>
    <script>
      // Minimal bounce page: initialize App Bridge, then reload the target route.
      var app = window['app-bridge'].default;
      var createApp = app.createApp;

      var actions = window['app-bridge'].actions;
      var Redirect = actions.Redirect;

      var shopifyApp = createApp({
        apiKey: @json($apiKey),
        host: @json($host),
        forceRedirect:,
      });

      var redirect = [Redirect.create](http://Redirect.create)(shopifyApp);
      redirect.dispatch([Redirect.Action.REMOTE](http://Redirect.Action.REMOTE), @json($reload));
    </script>
  </body>
</html>
