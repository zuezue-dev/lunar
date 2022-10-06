<?php

namespace Lunar\Api\Storefront;

use Lunar\Api\Actions;
use Lunar\Api\Concerns\HasChannel;
use Lunar\Api\Concerns\HasLanguage;
use Lunar\Base\Traits\HasMacros;
use Lunar\Models\Product;

class Products
{
    use HasChannel, HasLanguage, HasMacros;

    public function getByUrl($slug, $eagerLoad = [])
    {
        return (new Actions\Urls\FindBySlug(
            Product::class,
            $slug,
            $eagerLoad
        ))->execute();
    }

    public function getDefaultUrl($product, $language = null)
    {
        return (new Actions\Urls\GetDefaultUrl(
            $product,
            $language
        ))->execute();
    }

// Ideas...

    public function visible(Product $product)
    {
        return (new Actions\Product\CheckVisible(
            $product,
            $this->channel,
            //$this->customerGroup
        ))->execute();
    }

    public function purchasable(Product $product)
    {
        return (new Actions\Product\CheckPurchasable(
            $product,
            $this->channel,
            //$this->customerGroup
        ))->execute();
    }
}
