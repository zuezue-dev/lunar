# Examples

```php
    $channel = Lunar\Models\Channel::default(false)->first();
    $language = Lunar\Models\Language::default(false)->first();

    Storefront::setGlobalChannel($channel);
    Storefront::setGlobalLanguage($language);

    $url = Storefront::products()->getByUrl('pumps', ['element']);

    dump($url);

    if (! $url->default) {
        $url = Storefront::urls()->getDefaultUrl($url, ['element']);

        dump($url);
        // Redirect...
    }

    $product = $url->element;

    // if (! Storefront::visible($product)) {
    //     // 404
    // }

    dd($product);
```

# Ideas

- Add helpful scopes on Eloquent models

```php

// Determine whether to use Cart Session Manager or not
Storefront::cart()->useSession();

// Adds in more logic to check if something can be purchased
Storefront::cart()->add($variant, $qty);

// Checkout API example access
Checkout::reserveStock();
```