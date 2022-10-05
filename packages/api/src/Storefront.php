<?php

namespace Lunar\Api;

use Lunar\Api\Globals\GlobalChannel;
use Lunar\Api\Storefront\Products;
use Lunar\Models\Channel;

class Storefront
{
    protected ?Channel $channel;

    public function __construct()
    {
        $this->channel = app(GlobalChannel::class)->getChannel();
    }

    public function setGlobalChannel(Channel $channel)
    {
        app(GlobalChannel::class)->setChannel($channel);
        $this->setChannel($channel);

        return $this;
    }

    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;

        return $this;
    }

    public function products()
    {
        $products = app(Products::class);
        $products->setChannel($this->channel);

        return $products;
    }

    public function url()
    {
        return "Hello, " . $this->channel->name;
    }
}
