<?php

namespace Lunar\Api;

use Lunar\Api\Globals\GlobalChannel;
use Lunar\Api\Globals\GlobalLanguage;
use Lunar\Api\Storefront\Products;
use Lunar\Api\Storefront\Urls;
use Lunar\Models\Channel;
use Lunar\Models\Language;

class Storefront
{
    public function __construct()
    {
        $this->channel = app(GlobalChannel::class)->getChannel();
        $this->language = app(GlobalLanguage::class)->getLanguage();
    }

    public function setGlobalChannel(Channel $channel)
    {
        app(GlobalChannel::class)->setChannel($channel);

        return $this;
    }

    public function setGlobalLanguage(Language $language)
    {
        app(GlobalLanguage::class)->setLanguage($language);

        return $this;
    }

    public function products()
    {
        $products = app(Products::class);
        $products->setChannel($this->channel);

        return $products;
    }

    public function urls()
    {
        $urls = app(Urls::class);

        return $urls;
    }
}
