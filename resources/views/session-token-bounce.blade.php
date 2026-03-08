<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="shopify-api-key" content="{{ config('services.shopify.api_key') }}" />
    <meta name="shopify-host" content="{{ request('host') }}" />
    <title>Loading...</title>
</head>
<body>

<script src="https://cdn.shopify.com/shopifycloud/app-bridge.js"></script>

<script>
    const apiKey = document.querySelector('meta[name="shopify-api-key"]').content;
    const host = document.querySelector('meta[name="shopify-host"]').content;
    const reload = @json(request('shopify-reload'));

    const app = window['app-bridge'].createApp({
        apiKey: apiKey,
        host: host
    });

    // Redirect if reload parameter exists
    if (reload) {
        window.location.assign(reload);
    }
</script>

</body>
</html>